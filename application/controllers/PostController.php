<?php

class PostController extends Zend_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect('auth/login');
        }
    }

    public function init()
    {

    }

    public function indexAction()
    {
        $this->view->title = "My Posts";
        $this->view->headTitle($this->view->title);
        $posts = new Application_Model_DbTable_Posts();
        $this->view->posts = $posts->fetchAll();
    }

    public function addAction()
    {
        $this->view->form = $form = new Application_Form_Post();
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $post = new Application_Model_DbTable_Posts();
                $post->addPost($form->getValues());
                $this->_redirect('/post/index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        $this->view->form = $form = new Application_Form_Post();
        $id = $this->_request->getParam('id', 0);
        if ($this->_request->isPost() && $id>0) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $post = new Application_Model_DbTable_Posts();
                $post->updatePost($form->getValues(), $id);
                $this->_redirect('/post/index');
            } else {
                $form->populate($formData);
            }
        } else {
            if ($id>0) {
                $post = new Application_Model_DbTable_Posts();
                $form->populate($post->getPost($id));
            }
        }
    }

    public function deleteAction()
    {
         $id = $this->_request->getParam('id', 0);         
         if ($id>0) {
            $post = new Application_Model_DbTable_Posts();
            $post->deletePost($id);
         }
         $this->_redirect('/post/index');
    }


}







