<?php

namespace Blog\Form;

use Zend\Form\Form;

/**
 * Description of LoginForm
 *
 * @author claude
 * @package Blog\Form
 */
class LoginForm extends Form
{
    
    /**
     * construct login form
     * @param string $name
     */
    public function init($name = null) {
        //parent::__construct('Login');
        
        //$this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        
        //username
        $this->add(
        [
           'name' => 'username',
            'attributes' => 
            [
                'type' => 'text',
                'required' => 'required',
            ],
            'options' => 
            [
                'label' => 'Username: ',
            ],
            'filters' => 
            [
                ['name' => 'StringTrim'],
            ],            
        ]);
        
        //password
        $this->add([
            'name' => 'password',
            'attributes' => 
            [
                'type' => 'password',
                'required' => 'required',
            ],
            'options' => [
                'label' => 'Password',
            ],
        ]);
        
        //submit button
        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Send',
            ]
        ]);
    }
}
