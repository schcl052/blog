<?php

namespace BlogTest\V1\Rest\Post;

use Blog\V1\Rest\Post\PostEntity;
use Blog\Test\PhpunitTestCase;

class PostEntityTest extends PhpunitTestCase
{
    
    /**
     * instance
     * @var Blog\V1\Rest\Post\PostEntity 
     */
    protected $instance;

    /**
     * set up the test
     */
    public function setUp() {
        $this->instance = new PostEntity();
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
    
    /**
     * Test Get Set Fi User
     */
    public function testGetSetFiUser() {
        $fixture = 2;
        
        $this->assertSame($this->instance, $this->instance->setFiUser($fixture));
        $this->assertSame($fixture, $this->instance->getFiUser());
    }
    
    /**
     * Test Get Array Copy
     */
    public function testGetArrayCopy() {
        $fixture =
        [
            'idPost' => 1,
            'dtText' => "post text",
            'dtDate' => "2014-09-27 07:18:57",
            'fiUser' => 1,
        ];
         
        $this->setInaccessiblePropertyValue('idPost', 1);
        $this->setInaccessiblePropertyValue('text', "post text");
        $this->setInaccessiblePropertyValue('dateTime', "2014-09-27 07:18:57");
        $this->setInaccessiblePropertyValue('fiUser', 1);

        $this->assertSame($fixture, $this->instance->getArrayCopy());
    }
    
    public function testExchangeArray() {
        $postData = 
        [
            'idPost' => 1,
            'dtText' => "post text",
            'dtDate' => "2014-09-27 07:18:57",
            'fiUser' => 1,
        ];
        
        $this->instance->exchangeArray($postData);
        
        $this->assertSame(1, $this->getInaccessiblePropertyValue('idPost'));
        $this->assertSame("post text", $this->getInaccessiblePropertyValue('text'));
        $this->assertSame("2014-09-27 07:18:57", $this->getInaccessiblePropertyValue('dateTime'));
        $this->assertSame(1, $this->getInaccessiblePropertyValue('fiUser'));
    }
}