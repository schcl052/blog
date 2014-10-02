<?php

namespace Blog\Db;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of TableAbstractFactory
 *
 * @author claude
 */
class TableAbstractFactory implements AbstractFactoryInterface
{
    
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        //echo "<br>".$requestedName;
        return ((substr($requestedName, 0, strlen('application.db.')) == 'application.db.') && !(strpos($requestedName, 'TableGateway')));
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        $explodedName = explode('.', $requestedName);
        $className = ucfirst(array_pop($explodedName));
           
        $tableGateway = $serviceLocator->get("application.db.".lcfirst($className).'GatewayFactory');
        
        //$table = new UserTable($tableGateway);
        $className = "\\Blog\\Db\\".$className;
        $table = new $className($tableGateway);

        return $table;
    }

}