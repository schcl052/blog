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
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'blog.rest.post',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Blog\\V1\\Rest\\Post\\PostResource' => 'Blog\\V1\\Rest\\Post\\PostResourceFactory',
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
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Blog\\V1\\Rest\\Post\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Blog\\V1\\Rest\\Post\\Controller' => array(
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
        ),
    ),
);
