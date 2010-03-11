<?php

class Application_Model_DbTable_Posts extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'posts';
    
    public function getPost($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }
    
    public function addPost($values)
    {
        $data = array(
            'title' => $values['title'],
            'content' => $values['content'],
        );
        $this->insert($data);
    }
    
    public function updatePost($values, $id)
    {
        $data = array(
            'title' => $values['title'],
            'content' => $values['content'],
        );
        $this->update($data, 'id = ' . (int) $id);
    }
    
    public function deletePost($id)
    {
        $this->delete('id =' . (int) $id);
    }
}

