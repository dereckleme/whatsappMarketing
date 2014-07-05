<?php
namespace Usuario\Controller;
use Base\Controller\abstractController;
use Zend\View\Model\ViewModel;

use Zend\File\Transfer\Adapter\Http AS httpUploadFile;
use Zend\Filter\File\Rename;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\ImageSize;

class MensagensController extends abstractController
{ 
	public function indexAction()
	{
		return new ViewModel();
	}
	public function enviarAction()
	{
		
		$view = new ViewModel();
		$view->setTerminal(true);
		$request = $this->getRequest();
		if($request->isPost() && !empty($request->getPost("telefone")))
		{
			$vowels2 = array(" ","(",")","-");
			$onlyconsonants2 = str_replace($vowels2, "",$request->getPost("telefone"));
			$serviceGateway = $this->getServiceLocator()->get("Whatsapp\Service\Whatsapp");
			$serviceGateway->eventManager()->bind('onGetSyncResult', function($teste){
				if($teste->existing)
				{
					$request = $this->getRequest();
					$vowels = array("+", " ","(",")","-");
					$onlyconsonants = str_replace($vowels, "",$request->getPost("telefone"));
					$serviceGateway = $this->getServiceLocator()->get("Whatsapp\Service\Whatsapp");
					$requestPost = new httpUploadFile();
					$requestPost->setDestination('./public/img/files');
						
					$event = $this->getEvent();
					$request = $event->getRequest();
					$router = $event->getRouter();
					$uri = $router->getRequestUri();
					$baseUrl = sprintf('%s://%s%s', $uri->getScheme(), $uri->getHost().":10080", $request->getBaseUrl());
						
						
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
						if($imagem == false)
						{
							$serviceGateway->sendMessage($onlyconsonants,$request->getPost("mensagem"));
							print "enviada com sucesso;";
						}
						else
						{
							if(empty($request->getPost("mensagem")))
							{
								$serviceGateway->sendMessageImage($onlyconsonants,$baseUrl.'/img/files/'.$imagem);
								$serviceGateway->sendMessage($onlyconsonants, null);
								print "enviada com sucesso;";
							}
							else
							{
								$serviceGateway->sendMessageImage($onlyconsonants,$baseUrl.'/img/files/'.$imagem);
								$serviceGateway->sendMessage($onlyconsonants, $request->getPost("mensagem"));
								print "enviada com sucesso;";
							}
						}
				}
			});
			//send dataset to server
			$numbers = array($onlyconsonants2);
			$serviceGateway->sendSync($numbers);

			//wait for response
			while(true)
			{
				$serviceGateway->pollMessages();
			}
			return $view;
		}
		else
		{
			return $view;
		}
	}
}

