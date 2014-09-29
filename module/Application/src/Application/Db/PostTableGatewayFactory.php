<?php

namespace Application\Db;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\ResultSet;
use Application\Entity\Post;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;

/**
 * Description of UserTableGatewayFactory
 *
 * @author claude
 * @package Application\Db
 */
class PostTableGatewayFactory implements FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $dbAdapter = $serviceLocator->get('\Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new ResultSet();

        $resultSetPrototype->setArrayObjectPrototype(new Post());
        return new TableGateway('tblPost', $dbAdapter, NULL, $resultSetPrototype);
    }

}