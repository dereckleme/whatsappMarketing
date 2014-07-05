<?php
namespace Usuario;
use Usuario\Service\Lista;
use Usuario\Service\ListaCampanha;
use Usuario\Auth\Adapter;
use Zend\Authentication\AuthenticationService,
	Zend\Authentication\Storage\Session as SessionStorage;
class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function onBootstrap($e)
    {
    	$e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
    		/*
    		 * Definições de sessoes
    		*/
    		$auth = new AuthenticationService;
    		$auth->setStorage(new SessionStorage("Usuario"));
    		$controller      = $e->getTarget();
    		$controllerClass = get_class($controller);
    		$moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
    		$config          = $e->getApplication()->getServiceManager()->get('config');
    		 
    		/*
    		 * Permissão de usuário
    		*/
    		$matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
    		
    		if(!$auth->hasIdentity() && $matchedRoute != "login" && $matchedRoute != "gatewayTesteValidacao")
    		{
    			return $controller->redirect()->toRoute("login");
    		}
    		else if($auth->hasIdentity() && $matchedRoute == "login")
    		{
    			return $controller->redirect()->toRoute("enviarMensagem");
    		}
    		if($auth->hasIdentity())
    		{
    			$controller->layout()->infoUser = $auth->getIdentity();
    		} 
    	}, 100);
    }
    public function getServiceConfig() {
    	return array(
    			'factories' => array(
    					'Usuario\Service\Lista' => function($service){
    						$auth = new AuthenticationService;
    						$auth->setStorage(new SessionStorage("Usuario"));
    						$lista = new Lista($service->get('Doctrine\ORM\EntityManager'));
    						$lista->idUsuario = $auth->getIdentity()->getIdusuario();
    						return $lista;
    					},
    					'Usuario\Service\ListaCampanha' => function($service){
    						$ListaCampanha = new ListaCampanha($service->get('Doctrine\ORM\EntityManager'));
    						return $ListaCampanha;
    					},
    					'Usuario\Auth\Adapter' => function($service)
    					{
    						return new Adapter($service->get('Doctrine\ORM\EntityManager'));
    					}
    			)
    	);
    }
}
