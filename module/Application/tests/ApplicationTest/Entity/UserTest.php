<?php

namespace ApplicationTest\Entity;

use Application\Entity\User;

/**
 * User Test
 *
 * @author claude
 * @package ApplicationTest\Entity
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * instance
     * @var Application\Entity\User 
     */
    protected $instance;


    /**
     * setup the test
     */
    public function setUp() {
        $this->instance = new User();
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
        
        $this->assertSame($this->instance, $this->instance->setId($fixture));
        $this->assertSame($fixture, $this->instance->getId());
    }
    
    /**
     * Test Get Set Profile
     */
    public function testGetSetProfile() {
        $fixture = $this->getMock('Application\Entity\Profile');
        
        $this->assertSame($this->instance, $this->instance->setProfile($fixture));
        $this->assertSame($fixture, $this->instance->getProfile());
    }
    
    /**
     * 
     */
    public function testSetProfileException() {
       $fixture = new \stdClass();
       
       $this->setExpectedException('\\Application\\Entity\\Exception');
       
       $this->instance->setProfile($fixture);
    }
}

?>
