<?php

namespace Application\Db;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\ResultSet;
use Application\Entity\User;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;

/**
 * Description of UserTableGatewayFactory
 *
 * @author claude
 * @package Application\Db
 */
class UserTableGatewayFactory implements FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $dbAdapter = $serviceLocator->get('\Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new ResultSet();

        $resultSetPrototype->setArrayObjectPrototype(new User());
        return new TableGateway('tblUser', $dbAdapter, NULL, $resultSetPrototype);
    }

}