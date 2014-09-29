<?php

namespace Application\Form;

use Zend\Form\Form;

/**
 * Description of PostForm
 *
 * @author claude
 */
class PostForm extends Form
{
    
    /**
     * construct post form
     * @param string $name
     */
    public function __construct($name = null) {
        parent::__construct('Post');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        //post textarea
        $this->add([
            'name' => 'post',
            'attributes' => 
            [
                'type' => 'textarea',
                'required' => 'required',
            ],
            'options' => 
            [
                'label' => 'Post: ',
            ],
            'filters' => 
            [
                ['name' => 'StringTrim'],
            ],   
        ]);
        
        //submit button
        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Post',
            ]
        ]);
    }
}

?>
