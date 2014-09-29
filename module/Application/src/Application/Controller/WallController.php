<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;
use Application\Entity\User;

/**
 * Description of WallController
 *
 * @author claude
 * @package Application\Controller
 */
class WallController extends AbstractActionController
{
    
    /**
     * index Action
     */
    public function indexAction() {           
        //get form
        $postForm = $this->getServiceLocator()
                ->get('FormElementManager')
                ->get('application.form.PostForm');
        
        return new ViewModel(
            [
                'postForm' => $postForm,
            ]
        );
    }
    
    /**
     * process Action
     */
    public function processAction() {
        if($this->request->isPost()) {
            //get data for db persist
            $post = $this->request->getPost('post');
            $sessionUser = $this->getServiceLocator()
                    ->get('application.service.authServiceFactory')
                    ->getStorage()
                    ->read()['user'];
            
            //persist db
            $post = new Post();
            $post->setText($this->request->getPost('post'));
            
            $user = new User();
            $user->setId($sessionUser['id']);
            $post->setUser($user);
            
            $postTable = $this->getServiceLocator()->get('application.db.PostTable');
            
            $postTable->createPost($post);
            
            return $this->redirect()->toRoute('wall');
        } else {        
            //create form and display error
            $postForm = $this->getServiceLocator()
                    ->get('FormElementManager')
                    ->get('application.form.postForm');
        
            $model = new ViewModel(
            [
                'error'    => true,
                'postForm' => $postForm,
            ]);
            $model->setTemplate('/application/wall/index');
            
            return $model;
        }
    }
}

?>
