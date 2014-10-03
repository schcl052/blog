<?php

namespace Blog\Acl;

use Zend\Permissions\Acl\Acl as ZendAcl;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;

/**
 * MyAcl
 *
 * @package  Blog\Acl
 */
class MyAcl extends ZendAcl
{
    
    public function __construct() {
        
        //add roles
        $this->addRole(new Role('Guest'));
        $this->addRole(new Role('User'), 'Guest');
        $this->addRole(new Role('Admin'));
        
        //add resources
        $this->addResource('login');
        $this->addResource('user');
        $this->addResource('post');

        // Allow guests only to login
        $this->allow('Guest', null, 'login');

        // Allow users to read and write posts
        $this->allow('User', 'post', array('write', 'read'));

        // Allow admins everything
        $this->allow('Admin');
    }
    
}