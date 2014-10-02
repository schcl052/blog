<?php

namespace Blog\Entity;

use \Zend\ServiceManager\AbstractFactoryInterface;

/**
 * EntityAbstractFactory
 * 
 * @author claude
 * @package Blog\Entity
 */
class EntityAbstractFactory implements AbstractFactoryInterface
{
    /**
     * 
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @param type $name
     * @param type $requestedName
     * @return Boolean
     */
    public function canCreateServiceWithName(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        //test if the name starts with the given string
        return substr($requestedName, 0, strlen('application.entity.')) == 'application.entity.';
    }

    /**
     * 
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @param type $name
     * @param type $requestedName
     * @return \Blog\Entity\class
     */
    public function createServiceWithName(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        //get the last part of the name
        $explodedName = explode('.', $requestedName);
        $className = ucfirst(array_pop($explodedName));
        //create the full class name with namespace
        $class= 'Blog\\Entity\\'.$className;
        return new $class();
    }

}