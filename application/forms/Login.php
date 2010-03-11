<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->addElement('text', 'email', array(
            'Label' => 'E-mail',
            'required'=> true
        ));

        $this->addElement('text', 'password', array(
            'Label' => 'Password',
            'required'=> true
        ));

        $this->addElement('submit', 'login', array(
            'ignore' => true
        ));

    }


}

