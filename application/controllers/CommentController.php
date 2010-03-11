<?php

class CommentController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $this->view->form = $form = new Application_Form_Comment();
        // id post
        $id = $this->_request->getParam('id', 0);
        if ($this->_request->isPost() && $id>0) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $c = new Application_Model_DbTable_Comments();
                $c->addComment($form->getValues());
                $this->_redirect('/post/index');
            } else {
                $form->populate($formData);
            }
        } else {
            if ($id > 0) {
            $form->post->setValue($id);
            }
        }
    }

    public function editAction()
    {
        $this->view->form = $form = new Application_Form_Comment();
    }

    public function deleteAction()
    {
        // action body
    }

    public function replyAction()
    {
        $this->view->form = $form = new Application_Form_Comment();
        // id post
        $id = $this->_request->getParam('id', 0);
        $post = $this->_request->getParam('post', 0);
        if ($this->_request->isPost() && $id>0) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $c = new Application_Model_DbTable_Comments();
                $c->addComment($form->getValues());
                $this->_redirect('/post/index');
            } else {
                $form->populate($formData);
            }
        } else {
            if ($id > 0) {
            $form->parent->setValue($id);
            $form->post->setValue($post);
            }
        }
    }


}









