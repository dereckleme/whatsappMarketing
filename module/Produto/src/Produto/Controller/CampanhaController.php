<?php
namespace Produto\Controller;
use Base\Controller\abstractController;
use Zend\View\Model\ViewModel;

use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\ImageSize;

class CampanhaController extends abstractController
{ 

	public function listarAction()
	{
		$this->entity = "Produto\Entity\ProdutoCampanha";
		$this->find = array("status" => 1);
		return parent::listarAction();
	}
	public function inserirAction()
	{
		$request = $this->getRequest();
		if(!$request->isPost())
		{
			$this->entity = "Usuario\Entity\UsuarioListas";
			$this->find = array("validacao" => 2);
			return parent::listarAction();
		}
		else
		{
			$requestPost = new httpUploadFile();
			$requestPost->setDestination('./public/img/files');
			$imagem = false;
			foreach($requestPost->getFileInfo() as $file => $info)
			{
				$fname = $info['name'];
				$filtro = $requestPost->addFilter(new Rename(array(
						"target" => $fname,
						"randomize" => true
				)), null, $file);
				if($requestPost->receive())
				{
					$imagem = $filtro->getFileInfo()['imagem']['name'];
				}
			
			}
			$this->service = "Produto\Service\Campanha";
			parent::setData(array("idLista" => $request->getPost("lista"), 
								  "titulo" => $request->getPost("titulo"),
								  "descricao" => $request->getPost("mensagem"),
								  "imagem" => $imagem));
			parent::inserirAction();
		}
	}
}

