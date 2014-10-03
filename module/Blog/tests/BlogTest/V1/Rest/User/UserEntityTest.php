<?php

namespace BlogTest\V1\Rest\User;

use Blog\Test\PhpunitTestCase;
use Blog\V1\Rest\User\UserEntity;

class UserEntityTest extends PhpunitTestCase
{
    
    /**
     * instance
     * @var Blog\V1\Rest\User\UserEntity
     */
    protected $instance;
    
    /**
     * Set up the test
     */
    public function setUp() {
        $this->instance = new UserEntity();
    }
    
    /**
     * tear down the test
     */
    public function tearDown() {
        $this->instance = null;
    }
    
    /**
     * Test Get Set Username
     */
    public function testGetSetUsername() {
        $fixture = "username";
        
        $this->assertSame($this->instance, $this->instance->setUsername($fixture));
        $this->assertSame($fixture, $this->instance->getUsername());
    }
    
    /**
     * Test Get Set Password
     */
    public function testGetSetPassword() {
        $fixture = md5('password');
        
        $this->assertSame($this->instance, $this->instance->setPassword($fixture));
        $this->assertSame($fixture, $this->instance->getPassword());
    }
    
    /**
     * Test Get Set Id
     */
    public function testGetSetId() {
        $fixture = 1;
        
        $this->assertSame($this->instance, $this->instance->setIdUser($fixture));
        $this->assertSame($fixture, $this->instance->getIdUser());
    }
    
    /**
     * Test Get Array Copy
     */
    public function testGetArrayCopy() {
        $fixture =
        [
            'idUser' => 1,
            'username' => "username",
            'password' => "password",
            'dtRole' => "Admin",
        ];
         
        $this->setInaccessiblePropertyValue('idUser', 1);
        $this->setInaccessiblePropertyValue('username', "username");
        $this->setInaccessiblePropertyValue('password', "password");
        $this->setInaccessiblePropertyValue('role', "Admin");

        $this->assertSame($fixture, $this->instance->getArrayCopy());
    }
    
    /**
     * Test Exchange Array
     */
    public function testExchangeArray() {
        $userData = 
        [
            'idUser' => 1,
            'username' => "username",
            'password' => "password",
            'dtRole' => "Admin",
        ];
        
        $this->instance->exchangeArray($userData);
        
        $this->assertSame(1, $this->getInaccessiblePropertyValue('idUser'));
        $this->assertSame("username", $this->getInaccessiblePropertyValue('username'));
        $this->assertSame(NULL, $this->getInaccessiblePropertyValue('password'));
        $this->assertSame("Admin", $this->getInaccessiblePropertyValue('role'));
    }
   
}