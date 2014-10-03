<?php
return array(
    'router' => array(
        'routes' => array(
            'blog.rest.post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/post[/:post_id]',
                    'defaults' => array(
                        'controller' => 'Blog\\V1\\Rest\\Post\\Controller',
                    ),
                ),
            ),
            'blog.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'Blog\\V1\\Rest\\User\\Controller',
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
                        'controller' => 'Blog\Controller\Authentication',
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
                        'controller' => 'Blog\Controller\Wall',
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
                        'controller' => 'Blog\Controller\UserManagement',
                        'action' => 'index',
                    ],
                ],
                
            ],
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'blog.rest.post',
            1 => 'blog.rest.user',
        ),
    ),
    'form_elements' => 
    [
        'invokables' => 
        [
            'application.form.loginForm'    => 'Blog\Form\LoginForm',
            'application.form.registerForm' => 'Blog\Form\RegisterForm',
            'application.form.postForm'     => 'Blog\Form\PostForm',
        ],
    ],
    'service_manager' => array(
        'invokables' =>
        [
            'application.entity.user' => 'Blog\Entity\User',
            'application.acl' => 'Blog\Acl\MyAcl',
        ],
        'factories' =>
        [
            'Blog\\V1\\Rest\\Post\\PostResource' => 'Blog\\V1\\Rest\\Post\\PostResourceFactory',
            'Blog\\V1\\Rest\\User\\UserResource' => 'Blog\\V1\\Rest\\User\\UserResourceFactory',
            'application.service.authServiceFactory' => 'Blog\Service\AuthServiceFactory',
            'application.db.userTableGatewayFactory' => 'Blog\Db\UserTableGatewayFactory',
            'application.db.postTableGatewayFactory' => 'Blog\Db\PostTableGatewayFactory',
            /*'application.entity.user' => function($sm]
                {
                    $user = new \Application\Entity\User();
                    //$user->setProfile($sm->get('application.entity.profile'));
                    return $user;
                }*/
        ],
        'abstract_factories' => [
            //'Application\Entity\EntityAbstractFactory',
            'Blog\Db\TableAbstractFactory',
            //'Application\Form\FormAbstractFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
    ),
    'controllers' => 
    [
        'invokables' => 
        [
            'Blog\Controller\Index'          => 'Blog\Controller\IndexController',
            'Blog\Controller\Authentication' => 'Blog\Controller\AuthenticationController',
            'Blog\Controller\UserManagement' => 'Blog\Controller\UserManagementController',
            'Blog\Controller\Wall'           => 'Blog\Controller\WallController',
        ],
    ],
    'zf-rest' => array(
        'Blog\\V1\\Rest\\Post\\Controller' => array(
            'listener' => 'Blog\\V1\\Rest\\Post\\PostResource',
            'route_name' => 'blog.rest.post',
            'route_identifier_name' => 'post_id',
            'collection_name' => 'post',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '20',
            'page_size_param' => 'pageSize',
            'entity_class' => 'Blog\\V1\\Rest\\Post\\PostEntity',
            'collection_class' => 'Blog\\V1\\Rest\\Post\\PostCollection',
            'service_name' => 'Post',
        ),
        'Blog\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'Blog\\V1\\Rest\\User\\UserResource',
            'route_name' => 'blog.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'pageSize',
            'entity_class' => 'Blog\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'Blog\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Blog\\V1\\Rest\\Post\\Controller' => 'HalJson',
            'Blog\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Blog\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Blog\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Blog\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/json',
            ),
            'Blog\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Blog\\V1\\Rest\\Post\\PostEntity' => array(
                'entity_identifier_name' => 'idPost',
                'route_name' => 'blog.rest.post',
                'route_identifier_name' => 'post_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Blog\\V1\\Rest\\Post\\PostCollection' => array(
                'entity_identifier_name' => 'idPost',
                'route_name' => 'blog.rest.post',
                'route_identifier_name' => 'post_id',
                'is_collection' => true,
            ),
            'Blog\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'idUser',
                'route_name' => 'blog.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Blog\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'idUser',
                'route_name' => 'blog.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Blog\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'Blog\\V1\\Rest\\User\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Blog\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'name' => 'idUser',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            1 => array(
                'name' => 'username',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            2 => array(
                'name' => 'password',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            3 => array(
                'name' => 'role',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'error/accessDenied'      => __DIR__ . '/../view/error/accessDenied.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
);
