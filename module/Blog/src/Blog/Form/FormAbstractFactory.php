<?php

namespace Blog\Form;

use \Zend\ServiceManager\AbstractFactoryInterface;


/**
 * Description of FormAbstractFactory
 *
 * @author claude
 * @package Blog\Form
 */
class FormAbstractFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        //test if the name starts with the given string
        return substr($requestedName, 0, strlen('application.form.')) == 'application.form.';
    }
   

    public function createServiceWithName(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        //get the last part of the name
        $explodedName = explode('.', $requestedName);
        $className = ucfirst(array_pop($explodedName));
        //create the full class name with namespace
        $class= 'Blog\\Form\\'.$className;
        return new $class();
    }

}