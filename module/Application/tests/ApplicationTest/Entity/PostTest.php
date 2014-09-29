<?php

namespace ApplicationTest\Entity;

use Application\Entity\Post;

/**
 * Description of Post
 *
 * @author claude
 */
class PostTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     *
     * @var Application\Entity\Post 
     */
    protected $instance;
    
    /**
     * setup the test
     */
    public function setUp() {
        $this->instance = new Post();
    }
    
    /**
     * tear down the test
     */
    public function tearDown() {
        $this->instance = null;
    }
    
    /**
     * Test Get Set Text
     */
    public function testGetSetText() {
        $fixture = "text Post";
        
        $this->assertSame($this->instance, $this->instance->setText($fixture));
        $this->assertSame($fixture, $this->instance->getText());
    }
    
    /**
     * Test Get Set Date Time
     */
    public function testGetSetDateTime() {
        $fixture = "2014-09-27 07:18:57";
        
        $this->assertSame($this->instance, $this->instance->setDateTime($fixture));
        $this->assertSame($fixture, $this->instance->getDateTime());
    }
    
    public function testGetSetUser() {
        $fixture = $this->getMock('Application\\Entity\\User');
        
        $this->assertSame($this->instance, $this->instance->setUser($fixture));
        $this->assertSame($fixture, $this->instance->getUser());
    }
    
}

?>
