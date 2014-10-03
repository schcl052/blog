<?php
namespace Blog\V1\Rest\User;

class UserEntity
{
    
    /**
     * Id User
     * @var int 
     */
    protected $idUser;
    
    /**
     * Username
     * @var string
     */
    protected $username;
    
    /**
     * Password
     * @var string
     */
    protected $password;
    
    /**
     * Role
     * @var string
     */
    protected $role;
    
    /**
     * Get Id User
     * @return int
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Set Id User
     * @param int $idUser
     * @return \Blog\V1\Rest\User\UserEntity
     */
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * Get Username
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set Username
     * @param string $username
     * @return \Blog\V1\Rest\User\UserEntity
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * Get Password
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Get Password
     * @param string $password
     * @return \Blog\V1\Rest\User\UserEntity
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
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
     * @param strinf $role
     * @return \Blog\V1\Rest\User\UserEntity
     */
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    /**
     * Get Array Copy
     * @return array
     */
    public function getArrayCopy() {
        return
        [
            'idUser'   => $this->idUser,
            'username' => $this->username,
            'password' => $this->password,
            'dtRole'   => $this->role,
        ];
    }
    
    /**
     * Create the user from an array
     * @param array $data
     */
    public function exchangeArray(array $data) {
        $this->idUser   = $data['idUser'];
        $this->username = $data['username'];
        $this->role     = $data['dtRole'];
    }
}
