<?php

namespace Application\Db;


use Zend\Db\TableGateway\TableGateway;
use Application\Entity\User;

/**
 * UserTable
 *
 * @author claude
 * @package Application\Db
 */
class UserTable
{
    
    /**
     * tableGateway
     * @var Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function saveUser(User $user) {
        $data = 
        [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
        ];
        $id = (int)$user->getId();
                
        if($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getUser($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception("User Id does not exist!");
            }
        }
    }
    
    public function getUser($id) {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function fetchAll() {
        return $this->tableGateway->select();
    }
    
    public function getUserByUsername($username) {
        $rowset = $this->tableGateway->select(
            [
                'username' => $username
            ]
        );
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $username");
        }
        return $row;
    }
    
    public function deleteUser($id) {
        $this->tableGateway->delete(
            [
                'id' => $id
            ]
        );
    }
    
}

?>
