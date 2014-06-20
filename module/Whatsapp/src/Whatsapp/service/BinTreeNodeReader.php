<?php
namespace Whatsapp\Service; 
class BinTreeNodeReader
{
	private $input;
	/** @var $key KeyStream */
	private $key;

	public function resetKey()
	{
		$this->key = null;
	}

	public function setKey($key)
	{
		$this->key = $key;
	}

	public function nextTree($input = null)
	{
		if ($input != null) {
			$this->input = $input;
		}
		$stanzaFlag = ($this->peekInt8() & 0xF0) >> 4;
		$stanzaSize = $this->peekInt16(1);
		if ($stanzaSize > strlen($this->input)) {
			throw new Exception("Incomplete message $stanzaSize != " . strlen($this->input));
		}
		$this->readInt24();
		if ($stanzaFlag & 8) {
			if (isset($this->key)) {
				$realSize = $stanzaSize - 4;
				$this->input = $this->key->DecodeMessage($this->input, $realSize, 0, $realSize);// . $remainingData;
			} else {
				throw new Exception("Encountered encrypted message, missing key");
			}
		}
		if ($stanzaSize > 0) {
			return $this->nextTreeInternal();
		}

		return null;
	}

	protected function getToken($token)
	{
		$ret = "";
		$subdict = false;
		TokenMap::GetToken($token, $subdict, $ret);
		if(!$ret)
		{
			$token = $this->readInt8();
			TokenMap::GetToken($token, $subdict, $ret);
			if(!$ret)
			{
				throw new Exception("BinTreeNodeReader->getToken: Invalid token $token");
			}
		}
		return $ret;
	}

	protected function readString($token)
	{
		$ret = "";
		if ($token == -1) {
			throw new Exception("BinTreeNodeReader->readString: Invalid token $token");
		}
		if (($token > 4) && ($token < 0xf5)) {
			$ret = $this->getToken($token);
		} elseif ($token == 0) {
			$ret = "";
		} elseif ($token == 0xfc) {
			$size = $this->readInt8();
			$ret = $this->fillArray($size);
		} elseif ($token == 0xfd) {
			$size = $this->readInt24();
			$ret = $this->fillArray($size);
		} elseif ($token == 0xfe) {
			$token = $this->readInt8();
			$ret = $this->getToken($token + 0xf5);
		} elseif ($token == 0xfa) {
			$user = $this->readString($this->readInt8());
			$server = $this->readString($this->readInt8());
			if ((strlen($user) > 0) && (strlen($server) > 0)) {
				$ret = $user . "@" . $server;
			} elseif (strlen($server) > 0) {
				$ret = $server;
			}
		}

		return $ret;
	}

	protected function readAttributes($size)
	{
		$attributes = array();
		$attribCount = ($size - 2 + $size % 2) / 2;
		for ($i = 0; $i < $attribCount; $i++) {
			$key = $this->readString($this->readInt8());
			$value = $this->readString($this->readInt8());
			$attributes[$key] = $value;
		}

		return $attributes;
	}

	protected function nextTreeInternal()
	{
		$token = $this->readInt8();
		$size = $this->readListSize($token);
		$token = $this->readInt8();
		if ($token == 1) {
			$attributes = $this->readAttributes($size);

			return new ProtocolNode("start", $attributes, null, "");
		} elseif ($token == 2) {
			return null;
		}
		$tag = $this->readString($token);
		$attributes = $this->readAttributes($size);
		if (($size % 2) == 1) {
			return new ProtocolNode($tag, $attributes, null, "");
		}
		$token = $this->readInt8();
		if ($this->isListTag($token)) {
			return new ProtocolNode($tag, $attributes, $this->readList($token), "");
		}

		return new ProtocolNode($tag, $attributes, null, $this->readString($token));
	}

	protected function isListTag($token)
	{
		return (($token == 248) || ($token == 0) || ($token == 249));
	}

	protected function readList($token)
	{
		$size = $this->readListSize($token);
		$ret = array();
		for ($i = 0; $i < $size; $i++) {
			array_push($ret, $this->nextTreeInternal());
		}

		return $ret;
	}

	protected function readListSize($token)
	{
		$size = 0;
		if ($token == 0xf8) {
			$size = $this->readInt8();
		} elseif ($token == 0xf9) {
			$size = $this->readInt16();
		} else {
			throw new Exception("BinTreeNodeReader->readListSize: Invalid token $token");
		}

		return $size;
	}

	protected function peekInt24($offset = 0)
	{
		$ret = 0;
		if (strlen($this->input) >= (3 + $offset)) {
			$ret = ord(substr($this->input, $offset, 1)) << 16;
			$ret |= ord(substr($this->input, $offset + 1, 1)) << 8;
			$ret |= ord(substr($this->input, $offset + 2, 1)) << 0;
		}

		return $ret;
	}

	protected function readInt24()
	{
		$ret = $this->peekInt24();
		if (strlen($this->input) >= 3) {
			$this->input = substr($this->input, 3);
		}

		return $ret;
	}

	protected function peekInt16($offset = 0)
	{
		$ret = 0;
		if (strlen($this->input) >= (2 + $offset)) {
			$ret = ord(substr($this->input, $offset, 1)) << 8;
			$ret |= ord(substr($this->input, $offset + 1, 1)) << 0;
		}

		return $ret;
	}

	protected function readInt16()
	{
		$ret = $this->peekInt16();
		if ($ret > 0) {
			$this->input = substr($this->input, 2);
		}

		return $ret;
	}

	protected function peekInt8($offset = 0)
	{
		$ret = 0;
		if (strlen($this->input) >= (1 + $offset)) {
			$sbstr = substr($this->input, $offset, 1);
			$ret = ord($sbstr);
		}

		return $ret;
	}

	protected function readInt8()
	{
		$ret = $this->peekInt8();
		if (strlen($this->input) >= 1) {
			$this->input = substr($this->input, 1);
		}

		return $ret;
	}

	protected function fillArray($len)
	{
		$ret = "";
		if (strlen($this->input) >= $len) {
			$ret = substr($this->input, 0, $len);
			$this->input = substr($this->input, $len);
		}

		return $ret;
	}

}
?>