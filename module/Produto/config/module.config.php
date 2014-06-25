<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonBase for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
        		'criarCampanha' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/criarCampanhas',
        						'defaults' => array(
        								'controller' => 'Produto\Controller\Index',
        								'action'     => 'criarCampanhas',
        						),
        				),
        		),

        		'enviarMensagem' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/enviarMensagem',
        						'defaults' => array(
        								'controller' => 'Produto\Controller\Index',
        								'action'     => 'enviarMensagem',
        						),
        				),
        		),
        		'enviarCampanhas' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/enviarCampanhas',
        						'defaults' => array(
        								'controller' => 'Produto\Controller\Index',
        								'action'     => 'enviarCampanhas',
        						),
        				),
        		),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Produto\Controller\Index' => 'Produto\Controller\IndexController'            
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
    		'driver' => array(
    				'application_entities' => array(
    						'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Produto/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Produto\Entity' => 'application_entities'
    						)
    				))),
    				'view_manager' => array(
    						'display_not_found_reason' => true,
    						'display_exceptions'       => true,
    						'doctype'                  => 'HTML5',
    						'template_path_stack' => array(
    								__DIR__ . '/../view',
    						),
    				),
);