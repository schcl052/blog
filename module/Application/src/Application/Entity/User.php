<?php

namespace Application\Entity;

use Application\Entity\Profile;
use Application\Entity\Exception as EntityException;

/**
 * User
 *
 * @author claude
 * @package Application\Entity\User
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
     * profile
     * @var Application\Entity\Profile
     */
    protected $profile;
    
    /**
     * Set Username
     * 
     * @param type $username
     * @return \Application\Entity\User
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
     * @return \Application\Entity\User
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
     * @return \Application\Entity\User
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

        
    /**
     * Set Profile
     * 
     * @param type $profile
     * @return \Application\Entity\User
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
     * @return Application\Entity\Profile
     */
    public function getProfile() {
        return $this->profile;
    }
    
    public function exchangeArray($data){
        $this->username = isset($data['username'])?$data['username']: null;        
        $this->id = isset($data['idUser'])?$data['idUser']: null;
    }
}