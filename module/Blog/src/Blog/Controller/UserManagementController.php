<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Entity\User;

/**
 * UserManagementController
 *
 * @author claude
 * @package Zend\Mvc\Controller\AbstractActionController
 */
class UserManagementController extends AbstractActionController
{
    
    /**
     * index Action
     */
    public function indexAction() {
        return [];
    }
    
    /**
     * register Action
     */
    public function registerAction() {
        $sessionUser = $this->getServiceLocator()
                    ->get('application.service.authServiceFactory')
                    ->getStorage()
                    ->read()['user'];
        
        $acl = $this->getServiceLocator()
                ->get('application.acl');
        if($acl->isAllowed($sessionUser['role'], 'user', 'create')) {
            if($this->request->isPost()) {
                //prepare user to create
                $user = new User();
                $data = $this->request->getPost();
                $user->setUsername($data['username']);
                $user->setPassword(md5($data['password']));

                //persist user in db
                $userTable = $this->getServiceLocator()->get('application.db.UserTable');
                $userTable->saveUser($user);
                return $this->redirect()->toUrl('/userManagement');
            } else {
                //load & show form
                $registerForm = $this->getServiceLocator()->get('FormElementManager')->get('application.form.registerForm');
                $viewModel = new ViewModel(array('registerForm' => $registerForm));

                return $viewModel;
            }
        } else {
            $viewModel = new ViewModel();
            $viewModel->setTemplate('error/accessDenied');
            return $viewModel;
        }
    }
}