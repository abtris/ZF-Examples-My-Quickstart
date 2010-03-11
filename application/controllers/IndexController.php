<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        if ($log = $this->getLog()) {
            $this->logger = $log;
        }
    }

    public function indexAction()
    {
        $this->view->title = "My Posts";
        $this->view->headTitle($this->view->title);
        $posts = new Application_Model_DbTable_Posts();
        $this->view->posts = $posts->fetchAll();
    }

    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }
}

