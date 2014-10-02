<?php

namespace Blog\Form;

use Zend\Form\Form;

/**
 * Description of PostForm
 *
 * @author claude
 * @package Blog\Form
 */
class PostForm extends Form
{
    
    /**
     * construct post form
     * @param string $name
     */
    public function init($name = null) {
        //parent::__construct('Post');
        
        //$this->setAttribute('method', 'post');
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
