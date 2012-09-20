<?php

class PostController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->_forward('retrieve');
    }

    public function createAction()
    {
        $form = new Application_Form_Post();
        $post = new Application_Model_Posts();
        //tem dados
        if ($this->_request->isPost()) {
            //form valido
            if ($form->isValid($this->_request->getPost())) {
                $id = $post->insert($form->getValues());
                $this->_redirect('post/retrieve');
            }//form invalido

            $form->populate($form->getValues());
        }
        $this->view->form = $form;
    }

    public function retrieveAction()
    {
        $posts = new Application_Model_Posts();
        $this->view->posts = $posts->fetchAll();
    }

    public function updateAction()
    {
        $form = new Application_Form_Post();
        $form->setAction('/post/update');
        $form->submit->setLabel('Alterar');
        $posts = new Application_Model_Posts();

        //tem dados
        if ($this->_request->isPost()) {
            //form valido
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                $posts->update($values, 'id = ' . $values['id']);
                $this->_redirect('post/retrieve');
            }//form invalido
            else { // Mostra os erros e popula o form com os dados
                $form->populate($form->getValues());
            }
        } else { //não tem dados
            $id = $this->_getParam('id');
            $post = $posts->fetchRow("id =$id")->toArray();
            $form->populate($post);
        }
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $post = new Application_Model_Posts();
        $id = $this->_getParam('id');
        $post->delete("id = {$id}");
        $this->_redirect('post/retrieve');
    }

}

