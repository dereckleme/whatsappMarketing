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
        		'resulmoConta' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/resulmoConta',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Index',
        								'action'     => 'resulmoConta',
        						),
        				),
        		),
        		'minhasListas' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/minhasListas',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Index',
        								'action'     => 'minhasListas',
        						),
        				),
        		),
        		'criarLista' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/criarLista',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Index',
        								'action'     => 'criarLista',
        						),
        				),
        		),
        		'verPerfil' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/verPerfil',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Index',
        								'action'     => 'verPerfil',
        						),
        				),
        		),
        		'editarPerfil' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/editarPerfil',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Index',
        								'action'     => 'editarPerfil',
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
            'Usuario\Controller\Index' => 'Usuario\Controller\IndexController'            
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
    						'paths' => array(__DIR__ . '/../src/Usuario/Entity')
    				),
    
    				'orm_default' => array(
    						'drivers' => array(
    								'Usuario\Entity' => 'application_entities'
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