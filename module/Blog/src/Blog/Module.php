<?php
namespace Blog;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return 
        [
            'ZF\Apigility\Autoloader' =>
            [
                'namespaces' => 
                [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }
    
    public function getServiceConfig() {
        return 
        [
            'factories' => 
            [
                'Blog\V1\Rest\Post\PostMapper' =>  function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return new \Blog\V1\Rest\Post\PostMapper($adapter);
                },
            ],
        ];
    }
}
