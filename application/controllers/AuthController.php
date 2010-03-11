<?php

class AuthController extends Zend_Controller_Action
{
    
    public function init()
    {

    }
    
    public function indexAction()
    {

        // action body
    }
    
    public function loginAction()
    {
        $this->view->form = $form = new Application_Form_Login();

        if ($this->_request->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $bootstrap = $this->getInvokeArg('bootstrap');
                $resource = $bootstrap->getPluginResource('db');
                $db = $resource->getDbAdapter();

                $adapter = new Zend_Auth_Adapter_DbTable(
                        $db,
                        'users',
                        'email',
                        'password',
                        'SHA1(?)'
                );
                
                $adapter->setIdentity($form->getValue('email'))
                        ->setCredential($form->getValue('password'));

                $result = Zend_Auth::getInstance()->authenticate($adapter);
                if (Zend_Auth::getInstance()->hasIdentity()) {
                    $this->_redirect('post/index');
                } else {
                    $this->_redirect('auth/login');
                }

            }
        }
    }
    
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }
}





