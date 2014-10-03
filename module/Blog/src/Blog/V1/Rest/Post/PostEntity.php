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
     * get the post id
     * @return int
     */
    public function getIdPost() {
        return $this->idPost;
    }

    /**
     * set the post id
     * @param int $idPost
     * @return \Blog\V1\Rest\Post\PostEntity
     */
    public function setIdPost($idPost) {
        $this->idPost = $idPost;
        return $this;
    }

    /**
     * Get Text
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set Text
     * @param string $text
     * @return \Blog\V1\Rest\Post\PostEntity
     */
    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    /**
     * Gret Date Time
     * @return string
     */
    public function getDateTime() {
        return $this->dateTime;
    }

    /**
     * Set Date Time
     * @param string $dateTime
     * @return \Blog\V1\Rest\Post\PostEntity
     */
    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * Get FiUser
     * @return int
     */
    public function getFiUser() {
        return $this->fiUser;
    }

    /**
     * Set FiUser
     * @param int $fiUser
     * @return \Blog\V1\Rest\Post\PostEntity
     */
    public function setFiUser($fiUser) {
        $this->fiUser = $fiUser;
        return $this;
    }

        
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
