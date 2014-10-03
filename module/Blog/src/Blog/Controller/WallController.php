<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Entity\Post;
use Blog\Entity\User;

use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Request;
use Zend\Http\Client;
use Zend\Stdlib\Parameters;

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
        $sessionUser = $this->getServiceLocator()
                    ->get('application.service.authServiceFactory')
                    ->getStorage()
                    ->read()['user'];
        
        $acl = $this->getServiceLocator()
                ->get('application.acl');
        
        if($acl->isAllowed($sessionUser['role'], 'post', 'read')) {
            //get posts        
            //Set client
            $client = new Client();
            $method = $this->params()->fromQuery('method', 'get');
            $client->setUri('http://localhost:80'.$this->getRequest()->getBaseUrl().'/post');

            //Set headers
            $requestHeaders = $client->getRequest()->getHeaders();
            $headerString = 'Accept: application/json';
            $requestHeaders->addHeaderLine($headerString);

            //get REST reponse
            $response = $client->send();
            $posts = json_decode($response->getBody());

            $postForm = null;
            if($acl->isAllowed($sessionUser['role'], 'post', 'write')) {
                //get form
                $postForm = $this->getServiceLocator()
                        ->get('FormElementManager')
                        ->get('application.form.PostForm');
            }

            return new ViewModel(
                [
                    'postForm' => $postForm,
                    'posts'    => $posts->_embedded->post,
                ]
            );
        } else {
            $viewModel = new ViewModel();
            $viewModel->setTemplate('error/accessDenied');
            return $viewModel;
        }
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
            $model->setTemplate('/blog/wall/index');
            
            return $model;
        }
    }
}

?>
