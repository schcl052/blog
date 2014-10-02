<?php
namespace Blog\V1\Rest\User;

class UserEntity
{
    
    protected $idUser;
    
    protected $username;
    
    protected $password;
    
    protected $role;
    
    
    public function getArrayCopy() {
        return
        [
            'idUser'   => $this->idUser,
            'username' => $this->username,
            'password' => $this->password,
            'dtRole'   => $this->role,
        ];
    }
    
    public function exchangeArray($data) {
        $this->idUser   = $data['idUser'];
        $this->username = $data['username'];
        $this->role     = $data['dtRole'];
    }
}
