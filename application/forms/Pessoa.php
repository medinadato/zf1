<?php

abstract class Application_Form_Pessoa extends Zend_Form
{

    public function init()
    {
        $this->setName('Login');
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Login')->setRequired(true)->addFilter('StripTags')->addValidator('NotEmpty');
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Senha')->setRequired(true)->addFilter('StripTags')->addValidator('NotEmpty');
        $this->addElements(array($username, $password));
    }

}