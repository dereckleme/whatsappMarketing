<?php

namespace Whatsapp\Controller;
use Base\Controller\abstractController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService,
	Zend\Authentication\Storage\Session as SessionStorage;
class EnvioController extends abstractController
{
    public function enviarAction()
    {
    	$auth = new AuthenticationService;
    	$auth->setStorage(new SessionStorage("Usuario"));
    	
    	$request = $this->request;
    	if($request->isPost() && $auth->hasIdentity())
    	{	
    		$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    		$dados = $em->getRepository("Produto\Entity\ProdutoCampanha")->findOneBy(array(
    				"idcampanha" => $request->getPost("idCampanha"),
    				"usuario" => $auth->getIdentity()
    		));
    		if($dados)
    		{
    			$this->service = "Whatsapp\Service\Envio";
    			foreach($dados->getLista()->getListaTelefones() AS $telefone)
    			{
    				parent::setData(array(
    						"idCampanha" => $request->getPost("idCampanha"),
    						"prioridade" => 1,
    						"telefone" => $telefone->getTelefone()
    				));
    				parent::inserirAction();
    			}
    			$this->service = "Produto\Service\Campanha";
    			parent::setData(array("id" => $request->getPost("idCampanha"),"status" => 2));
    			parent::editarAction();
    		}
    	}
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    public function validacaoAction()
    {
    	$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    	$dados = $em->getRepository("Usuario\Entity\UsuarioListas")->findOneBy(array("validacao" => 1));
    	$quantPLista = 2;
    	if($dados)
    	{
    		$totalNumeros = count($dados->getListaTelefones())-1;
    		foreach($dados->getListaTelefones() as $key => $item)
    		{
    			if($item->getValido() == 0)
    			{
    				//Processo de validação
    			}
    			else if($item->getValido() == 1)
    			{
    				// Numero valido
    			}
    			else if($item->getValido() == 2)
    			{
    				// invalido
    			}
    		}
    	}
    	die();
    	$view = new ViewModel();
    	$view->setTerminal(true);
    	return $view;
    }
}

