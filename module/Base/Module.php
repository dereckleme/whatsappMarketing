<?php
namespace Base;

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
    		$controller      = $e->getTarget();
    		$controllerClass = get_class($controller);
    		/*
    		 * Permissão de usuário
    		*/
    		$matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
    		$controller->layout()->setterMenu = $matchedRoute;
    	});
    }
}
