<?php

namespace Usuario\Controller;

use Base\Controller\abstractController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService,
	Zend\Authentication\Storage\Session as SessionStorage;
class ContaController extends abstractController
{

    public function resulmoContaAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
    	$request = $this->getRequest();
    	if($request->isPost())
    	{
    			$data = $request->getPost()->toArray();
                
                // Criando Storage para gravar sessão da authtenticação
                $sessionStorage = new SessionStorage("Usuario");
                
                $auth = new AuthenticationService;
                $auth->setStorage($sessionStorage); // Definindo o SessionStorage para a auth
                
                $authAdapter = $this->getServiceLocator()->get("Usuario\Auth\Adapter");
                $authAdapter->setUsername($data['eventLogin']);
                $authAdapter->setPassword($data['eventPassword']);
                
                $result = $auth->authenticate($authAdapter);
                
                if($result->isValid())
                {
                    $sessionStorage->write($auth->getIdentity()['usuario'],null);
                }
    	}
    	$this->layout('layout/login');
        return new ViewModel();
    }
    public function logoutAction()
    {
    	$auth = new AuthenticationService;
    	$auth->setStorage(new SessionStorage("Usuario"));
    	$auth->clearIdentity();
    
    	return $this->redirect()->toRoute('login');
    }

}

