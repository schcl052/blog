<?php

namespace Blog\Db;

use Zend\Db\TableGateway\TableGateway;
use Blog\Entity\Post;

/**
 * Description of PostTable
 *
 * @author claude
 */
class PostTable 
{
    /**
     * table Gateway
     * @var Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;
    
    /**
     * __construct
     * @param \Zend\Db\TableGateway\TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function createPost(Post $post) {
        $data =
        [
            'dtText' => $post->getText(),
            'fiUser' => $post->getUser()->getId(),
        ];
        $this->tableGateway->insert($data);
    }
}