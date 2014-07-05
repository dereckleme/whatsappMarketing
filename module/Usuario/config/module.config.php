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

        		'enviarMensagem' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/enviarMensagens',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Mensagens',
        								'action'     => 'index',
        						),
        				),
        		),
        		'adicionaFilaMensagem' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/adicionaFilaMensagem',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Mensagens',
        								'action'     => 'enviar',
        						),
        				),
        		),
        		'minhasListas' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/minhasListas',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Lista',
        								'action'     => 'listar',
        						),
        				),
        				'may_terminate' => true,
        				'child_routes' => array(
        						'validar' => array(
        								'type'    => 'Literal',
        								'options' => array(
        										'route'    => '/validar',
        										'defaults' => array(
        											'action'     => 'validar'
        										),
        								),
        						),
        				),
        		),
        		'criarLista' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/criarLista',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Lista',
        								'action'     => 'inserir',
        						),
        				),
        		),
        		'resulmoConta' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/resulmoConta',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Conta',
        								'action'     => 'resulmoConta',
        						),
        				),
        		),
        		'verPerfil' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/verPerfil',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Conta',
        								'action'     => 'listar',
        						),
        				),
        		),
        		'editarPerfil' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/editarPerfil',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Conta',
        								'action'     => 'editar',
        						),
        				),
        		),
        		'login' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/login',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Conta',
        								'action'     => 'login',
        						),
        				),
        		),
        		'sair' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route'    => '/sair',
        						'defaults' => array(
        								'controller' => 'Usuario\Controller\Conta',
        								'action'     => 'logout',
        						),
        				),
        		)
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
            'Usuario\Controller\Conta' => 'Usuario\Controller\ContaController',
            'Usuario\Controller\Lista' => 'Usuario\Controller\ListaController',
            'Usuario\Controller\Mensagens' => 'Usuario\Controller\MensagensController'
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