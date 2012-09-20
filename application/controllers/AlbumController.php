<?php
/**
 * Album
 *
 * @package default
 * @author Elton Minetto
 **/
class AlbumController extends Zend_Controller_Action {
    
    /**
     * Album 
     *
     * @return void
     * @author Elton Minetto
     **/
    public function indexAction() {
        $form = new Application_Form_Album;

        //verifica se foram enviados dados via post
        if ($this->_request->isPost()) {
            //pega os dados enviados
            $formData = $this->_request->getPost(); 
        
            //verifica se o formulário está válido
            //de acordo com os validadores do Zend_Form
            if ($form->isValid($formData)) {
                $adapter = $form->arq->getTransferAdapter(); 
                //indica o destino dos arquivos temporários
                $adapter->setDestination('/tmp');
                try { 
                    //recebe o arquivo
                    $adapter->receive(); 
                } catch (Zend_File_Transfer_Exception $e) { 
                    echo $e->getMessage(); 
                }

                //nome do arquivo
                $name = $adapter->getFileName();
                //tamanho
                $size = $adapter->getFileSize();
                //tipo
                $mimeType = $adapter->getMimeType();

                // somenete mostra os detalhes do arquivo
                echo "Nome do arquivo enviado: $name", "<br>";
                echo "Tamanho do arquivo: $size", "<br>";
                echo "Tipo: $mimeType", "<br>";

                // Novo nome do arquivo
                $renameFile = 'NovoNome.jpg';

                $fullFilePath = '/tmp/'.$renameFile;

                // renomeia usando o Zend Framework
                $filterFileRename = new Zend_Filter_File_Rename(array('target' => $fullFilePath, 'overwrite' => true));

                $filterFileRename->filter($name);
            }//se o formulário está inválido
            else { 
                // Mostra os erros e popula o form com os dados corretos
                $form->populate($formData); 
            }
        }
        else { 
            //ainda não foi submetido dados
        }
        $this->view->form = $form;
    }
    
}