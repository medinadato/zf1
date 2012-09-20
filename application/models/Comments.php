<?php

class Application_Model_Comments extends Zend_Db_Table_Abstract
{

    protected $_name = 'comments';
    protected $_referenceMap = array(
        'Posts' => array(
            'columns'           => array('post_id'),
            'refTableClass'     => 'Application_Model_Posts',
            'refColumns'        => array('id'),
        ),
    );

}

