<?php

class Post extends CI_Model{

    public $Id, $Title, $DatePost, $Body, $UserId;

    public function __construct(){

        $this->load->database();
    }

    public function SavePost(){

        $sql = 'Insert into Posts (Title,Body,DatePost,UserId) values(?,?,?,?)';
        $result =  $this->db->query($sql,array($this->Title, $this->Body, $this->DatePost, $this->UserId));
        
        if($result > 0){

            return TRUE;

        }else{
    
            return FALSE;

        }
        
    }

    public function UpdatePost(){

        $sql = 'Update Posts set Title=?, Body=?, DatePost=?, UserId=? where ID=?';
        return $this->db->query($sql,array($this->Title, $this->Body, $this->DatePost, $this->UserId, $this->Id));

    }

    public function DeletePost(){

        return $this->db->query('Delete from Posts where ID=?',$this->Id);

    }

    public function RetrievePost($PId,$UId){

        $sql = 'select * from Posts where Id =' .$this->db->escape($PId). ' and UserId =' .$this->db->escape($UId). '';
        $query = $this->db->query($sql);
        return $query->result();
        
    }

    public function RetrieveAllPost($UId){

        $sql = 'select * from Posts where userid = ' . $UId;
        $query = $this->db->query($sql);
        return $query->result();

    }

}