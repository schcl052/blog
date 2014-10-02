<?php

namespace Blog\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Db\Adapter\Adapter;

/**
 * Description of AuthServiceFactory
 *
 * @author claude
 * @package Blog\Service
 */
class AuthServiceFactory implements FactoryInterface
{
    
    /**
     * authservice
     * @var AuthenticationService
     */
    protected $authService;


    /**
     * 
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return Zend\Authentication\AuthenticationService
     */
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        if(!$this->authService){
            $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
            $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'tblUser', 'username', 'password', 'MD5(?)');
            $authService = new AuthenticationService();
            $authService->setAdapter($dbTableAuthAdapter);
            $this->authService = $authService;
        }
        return $this->authService;
    }

}