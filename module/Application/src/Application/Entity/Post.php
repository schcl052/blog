<?php

namespace Application\Entity;

use Application\Entity\User;

/**
 * Description of Post
 *
 * @author claude
 */
class Post 
{
    
    /**
     * text
     * @var string 
     */
    protected $text;
    
    /**
     * date time
     * @var string
     */
    protected $dateTime;
    
    /**
     *
     * @var Application\Entity\User
     */
    protected $user;


    /**
     * get text
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * set text
     * @param string $text
     * @return \Application\Entity\Post
     */
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
    
    /**
     * get date time
     * @return string
     */
    public function getDateTime() {
        return $this->dateTime;
    }

    /**
     * set date time
     * @param string $dateTime
     * @return \Application\Entity\Post
     */
    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * get User
     * @return Application\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * set user
     * @param \Application\Entity\User $user
     * @return \Application\Entity\Post
     */
    public function setUser(User $user) {
        $this->user = $user;
        return $this;
    }
    
    public function exchangeArray() {
        
    }

}