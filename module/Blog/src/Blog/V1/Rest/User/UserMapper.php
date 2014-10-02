<?php

namespace Blog\V1\Rest\User;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

/**
 * User Mapper
 *
 * @author claude
 * @package Blog\V1\Rest\User
 */
class UserMapper 
{
    /**
     * database adapter
     * @var AdapterInterface 
     */
    protected $adapter;
    
    /**
     * construct the User Mapper
     * @param \Zend\Db\Adapter\AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
 
    /**
     * Get all Users (User Collection)
     * @return \Blog\V1\Rest\User\UserCollection
     */
    public function fetchAll()
    {
        $select = new Select('tblUser');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new UserCollection($paginatorAdapter);
        return $collection;
    }
 
    /**
     * Get a single User
     * @param int $idUser
     * @return boolean|\Blog\V1\Rest\User\UserEntity
     */
    public function fetchOne($idUser)
    {
        $sql = 'SELECT * FROM tblUser WHERE idUser = ?';
        $resultset = $this->adapter->query($sql, array($idUser));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }
 
        $entity = new UserEntity();
        $entity->exchangeArray($data[0]);
        return $entity;
    }
}