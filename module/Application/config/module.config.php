<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'login' =>
            [
                'type' => 'Segment',
                'options' =>
                [
                    'route' => '/login[/:action]',
                    'defaults' => 
                    [
                        'controller' => 'Application\Controller\Authentication',
                        'action' => 'index',
                    ],
                ],                
            ],
            'wall' =>
            [
                'type' => 'Segment',
                'options' =>
                [
                    'route' => '/wall[/:action]',
                    'defaults' => 
                    [
                        'controller' => 'Application\Controller\Wall',
                        'action' => 'index',
                    ],
                ],
            ],
            'userManagement' =>
            [
                'type' => 'Segment',
                'options' =>
                [
                    'route' => '/userManagement[/:action]',
                    'defaults' => 
                    [
                        'controller' => 'Application\Controller\UserManagement',
                        'action' => 'index',
                    ],
                ],
                
            ],
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' =>
        [
            'application.entity.user' => 'Application\Entity\User',
        ],
        'factories' =>
        [
            'application.service.authServiceFactory' => 'Application\Service\AuthServiceFactory',
            'application.db.userTableGatewayFactory' => 'Application\Db\UserTableGatewayFactory',
            'application.db.postTableGatewayFactory' => 'Application\Db\PostTableGatewayFactory',
            /*'application.entity.user' => function($sm)
                {
                    $user = new \Application\Entity\User();
                    //$user->setProfile($sm->get('application.entity.profile'));
                    return $user;
                }*/
        ],
        'abstract_factories' => array(
            //'Application\Entity\EntityAbstractFactory',
            'Application\Db\TableAbstractFactory',
            'Application\Form\FormAbstractFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => 
    [
        'invokables' => 
        [
            'Application\Controller\Index'          => 'Application\Controller\IndexController',
            'Application\Controller\Authentication' => 'Application\Controller\AuthenticationController',
            'Application\Controller\UserManagement' => 'Application\Controller\UserManagementController',
            'Application\Controller\Wall'           => 'Application\Controller\WallController',
        ],
    ],
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);