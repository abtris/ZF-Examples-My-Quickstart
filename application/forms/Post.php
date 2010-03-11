<?php

class Application_Form_Post extends Zend_Form
{

    public function init()
    {
        $this->addElement('text', 'title', array(
            'Label' => 'Title',
            'required'=> true
        ));

        $this->addElement('textarea', 'content', array(
            'Label' => 'Content',
            'required'=> true
        ));

        $this->addElement('submit', 'Add', array(
            'ignore' => true
        ));
    }


}

