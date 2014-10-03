<?php

namespace Blog\Entity;

use Blog\Entity\Profile;
use Blog\Entity\Exception as EntityException;

/**
 * User
 *
 * @author claude
 * @package Blog\Entity\User
 */
class User 
{
    /**
     * username
     * @var string 
     */
    protected $username;
    
    /**
     * password
     * @var string 
     */
    protected $password;
    
    /**
     * id
     * @var int 
     */
    protected $id;
    
    /**
     * role
     * @var string 
     */
    protected $role;
    
    /**
     * profile
     * @var Blogofile
     */
    protected $profile;
    
    /**
     * Set Username
     * 
     * @param type $username
     * @return \Blog\Entity\User
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }
    
    /**
     * Get Username
     * 
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }
    
    /**
     * Set Password
     * 
     * @param type $password
     * @return \Blog\Entity\User
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
    /**
     * Get Password
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Get Id
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set Id 
     * @param type $id
     * @return \Blog\Entity\User
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

        
    /**
     * Set Profile
     * 
     * @param type $profile
     * @return \Blog\Entity\User
     */
    public function setProfile($profile) {
        if(!$profile instanceof Profile) {
            throw new EntityException('Invalid type for profile');
        }
        $this->profile = $profile;
        return $this;
    }
    
    /**
     * Get Profile
     * @return Blog\Entity\Profile
     */
    public function getProfile() {
        return $this->profile;
    }
    
    /**
     * Get Role
     * @return string
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Set Role
     * @param string $role
     * @return \Blog\Entity\User
     */
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    /**
     * Exchange Array
     * @param type $data
     */
    public function exchangeArray($data){
        $this->username = isset($data['username'])?$data['username']: null;        
        $this->id = isset($data['idUser'])?$data['idUser']: null;
        $this->role = isset($data['dtRole'])?$data['dtRole']: null;
    }
}