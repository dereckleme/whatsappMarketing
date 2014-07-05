<?php
namespace Produto;
use Produto\Service\Campanha;
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
    public function getServiceConfig() {
    	return array(
    			'factories' => array(
    					'Produto\Service\Campanha' => function($service){
    						$auth = new AuthenticationService;
    						$auth->setStorage(new SessionStorage("Usuario"));
    						$Campanha = new Campanha($service->get('Doctrine\ORM\EntityManager'));
    						$Campanha->idUsuario = $auth->getIdentity()->getIdusuario();
    						return $Campanha;
    					},
    			)
    	);
    }
}
