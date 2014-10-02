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
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'blog.rest.post',
            1 => 'blog.rest.user',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Blog\\V1\\Rest\\Post\\PostResource' => 'Blog\\V1\\Rest\\Post\\PostResourceFactory',
            'Blog\\V1\\Rest\\User\\UserResource' => 'Blog\\V1\\Rest\\User\\UserResourceFactory',
        ),
    ),
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
);
