<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * AuthenticationController
 *
 * @author claude
 * @package Application\Controller
 */
class AuthenticationController extends AbstractActionController
{
    
    /**
     * Login Action
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction() {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('application.form.loginForm');
        $viewModel = new ViewModel(array('form' => $form));
        
        return $viewModel;
    }
    
    /**
     * Process Action
     * @return \Zend\View\Model\ViewModel
     */
    public function processAction() {
        //pass the identity and credentials to the AuthService
        $authService = $this->getServiceLocator()
                ->get('application.service.authServiceFactory');       
        
        $authService->getAdapter()
                ->setIdentity($this->request->getPost('username'))
                ->setCredential($this->request->getPost('password'));
        
        //authenticate
        $result = $authService->authenticate(); 
        //test if authentication succeeded
        if($result->isValid()) {
            $userTable = $this->getServiceLocator()->get('application.db.UserTable');
            $user = $userTable->getUserByUsername($this->request->getPost('username'));
            
            $authService->getStorage()->write(
                [
                    'user' =>
                    [
                        'id'       => $user->getId(),
                        'username' => $user->getUsername(),
                    ]
                ]
            );            
            return $this->redirect()->toUrl('/wall');
        } else {
            //not succeeded show form & error
            $form = $this->getServiceLocator()->get('application.form.loginForm');
            $model = new ViewModel(array(
                'error' => true,
                'form' => $form,
            ));
            $model->setTemplate('/application/authentication/index');
            return $model;
        }
    }
    
}