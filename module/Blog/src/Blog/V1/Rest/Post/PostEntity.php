<?php
namespace Blog\V1\Rest\Post;

/**
 * Post Entity
 * @package Blog\V1\Rest\Post
 */
class PostEntity
{
    /**
     * id of the post
     * @var int
     */
    protected $idPost;
    
    /**
     * Test of the post
     * @var string 
     */
    protected $text;
    
    /**
     * date and time when the post was created
     * @var string 
     */
    protected $dateTime;
    
    /**
     * id of the user that created the post
     * @var int
     */
    protected $fiUser;
    
    /**
     * Create an array from a object
     * @return array
     */
    public function getArrayCopy() {
        return
        [
            'idPost' => $this->idPost,
            'dtText' => $this->text,
            'dtDate' => $this->dateTime,
            'fiUser' => $this->fiUser,
        ];
    }
    
    /**
     * initalize a object with an array
     * @param array $data
     */
    public function exchangeArray($data) {
        $this->idPost   = $data['idPost'];
        $this->text     = $data['dtText'];
        $this->dateTime = $data['dtDate'];
        $this->fiUser   = $data['fiUser'];
    }
}
