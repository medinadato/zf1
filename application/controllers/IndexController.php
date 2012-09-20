<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->form = new Application_Form_Login;
    }
    
    public function showAction()
    {
        // action body
    }


}

