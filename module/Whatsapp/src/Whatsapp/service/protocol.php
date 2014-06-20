<?php
namespace Whatsapp\Service;
//require 'decode.php';
//require 'exception.php';

class IncompleteMessageException extends CustomException
{
    private $input;

    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function getInput()
    {
        return $this->input;
    }

}






