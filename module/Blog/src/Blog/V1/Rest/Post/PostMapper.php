<?php

namespace Blog\V1\Rest\Post;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

/**
 * Description of PostMapper
 *
 * @author claude
 * @package Blog\V1\Rest\Post
 */
class PostMapper 
{
    /**
     * database adapter
     * @var AdapterInterface 
     */
    protected $adapter;
    
    /**
     * construct the Post Mapper
     * @param \Zend\Db\Adapter\AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
 
    /**
     * Get all Posts (Post Collection)
     * @return \Blog\V1\Rest\Post\PostCollection
     */
    public function fetchAll()
    {
        $select = new Select('tblPost');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new PostCollection($paginatorAdapter);
        return $collection;
    }
 
    /**
     * Get a single Post
     * @param int $idPost
     * @return boolean|\Blog\V1\Rest\Post\PostEntity
     */
    public function fetchOne($idPost)
    {
        $sql = 'SELECT * FROM tblPost WHERE idPost = ?';
        $resultset = $this->adapter->query($sql, array($idPost));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }
 
        $entity = new PostEntity();
        $entity->exchangeArray($data[0]);
        return $entity;
    }
}