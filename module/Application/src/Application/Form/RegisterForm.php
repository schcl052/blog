<?php

namespace Application\Form;

/**
 * RegisterForm
 *
 * @author claude
 * @package Application\Form
 */
class RegisterForm extends LoginForm
{
    
    /**
     * construct login form
     * @param string $name
     */
    public function init($name = null) {
        parent::init('Register');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        
        //firstname
        $this->add(
        [
           'name' => 'firstname',
            'attributes' => 
            [
                'type' => 'text',
                'required' => 'required',
            ],
            'options' => 
            [
                'label' => 'Firstname: ',
            ],
            'filters' => 
            [
                ['name' => 'StringTrim'],
            ],            
        ]);
        
        //lastname
        $this->add(
        [
           'name' => 'lastname',
            'attributes' => 
            [
                'type' => 'text',
                'required' => 'required',
            ],
            'options' => 
            [
                'label' => 'Lastname: ',
            ],
            'filters' => 
            [
                ['name' => 'StringTrim'],
            ],            
        ]);
        
       
    }
}
