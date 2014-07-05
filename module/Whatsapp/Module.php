<?php
namespace Whatsapp;
use Whatsapp\Service\WhatsProt;
use Whatsapp\Service\Envio;
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
    					'Whatsapp\Service\Whatsapp' => function($sm)
    					{
    						$nickname = "Gateway Envio";
    						$sender = 	"5511949962945";
    						$imei = 	"358700041496533";
    						$password = "/ZPakne3xFohdaoGbLwBLi85e5g=";
    						$whatsapp = new WhatsProt($sender, $imei, $nickname, false);
    						$whatsapp->connect();
    						$whatsapp->loginWithPassword($password);
    						return $whatsapp;
    					},
    					'Whatsapp\Service\Envio' => function($sm)
    					{
    						$Envio = new Envio($sm->get('Doctrine\ORM\EntityManager'));
    						return $Envio;
    					}
    			),
    	);
    }
}
