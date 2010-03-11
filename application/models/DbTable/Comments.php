<?php

class Application_Model_DbTable_Comments extends Zend_Db_Table_Abstract
{

    protected $_name = 'comments';

    public function getCommentbyPost($id)
    {
        $id = (int) $id;
        $row = $this->fetchAll('parent IS NULL AND post = ' . $id);
        if (!$row) {
            throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }

    public function getReply($id)
    {
        $id = (int) $id;
        $row = $this->fetchAll('parent = ' . $id);
        if (!$row) {
            throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }

    public function getComment($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }

    public function addComment($values)
    {
        $data = array(
            'comment' => $values['comment'],
            'post' => $values['post'],
            'parent' => empty($values['post']) ? new Zend_Db_Expr('NULL') : $values['parent']
        );
        $this->insert($data);
    }

    public function updateComment($values, $id)
    {
        $data = array(
            'comment' => $values['comment'],
            'post' => $values['post'],
            'parent' => $values['parent']
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteComment($id)
    {
        $this->delete('id =' . (int) $id);
    }
}

