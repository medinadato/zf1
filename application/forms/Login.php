<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        //nome do formulário
        $this->setName('Login');
        //elemento para o campo username
        $username = new Zend_Form_Element_Text('username');
        //configurar o label, dizer q é obrigatório, adicionar um filtro e um validador
        $username->setLabel('Login')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addValidator('NotEmpty');
        //elemento para a senha
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Senha')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addValidator('NotEmpty');
        //botão de submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Entrar');
        $submit->setAttrib('id', 'Entrar')
                ->setIgnore(true);
        //exemplo de class css
        //$submit->setAttrib('class', 'verde buttonBar');
        //adicionar os campos ao formulário
        $this->addElements(array($username, $password, $submit));
        //action e method
        $this->setAction('/auth/index')->setMethod('post');
    }

}

