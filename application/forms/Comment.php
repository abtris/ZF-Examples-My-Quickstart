<?php

class Application_Form_Comment extends Zend_Form
{

    public function init()
    {
        $this->addElement('textarea', 'comment', array(
            'Label' => 'Comment',
            'required'=> true
        ));

        $this->addElement('hidden', 'parent', array(

        ));

        $this->addElement('hidden', 'post', array(
            'required'=> true
        ));

        $this->addElement('submit', 'Add', array(
            'ignore' => true
        ));

    }


}

