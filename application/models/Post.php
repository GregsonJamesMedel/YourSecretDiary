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

    public function UpdatePost($title,$body,$datepost,$id,$userid){

        $sql = 'Update Posts set Title=?, Body=?, DatePost=?, UserId=? where ID=?';
        $result = $this->db->query($sql,array($title, $body, $datepost, $userid, $id));
        if($result > 0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function DeletePost($PId,$UId){
        
        $this->db->query('Delete from Posts where ID=? and UserId=?',array($PId,$UId));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }

    }

    public function RetrievePost($PId,$UId){

        $sql = 'select * from Posts where Id =' .$this->db->escape($PId). ' and UserId =' .$this->db->escape($UId). '';
        $query = $this->db->query($sql);
        return $query->row();
        
    }

    public function RetrieveAllPost($UId){

        $sql = 'select * from Posts where userid = ' . $UId . ' order by DatePost desc';
        $query = $this->db->query($sql);
        return $query->result();

    }

    public function IsDate_Valid($date){
        $query = $this->db->query('select Id from Posts where DatePost =' . $this->db->escape($date) . 
                                'and UserId =' . $this->db->escape($this->session->userdata('currentUser')->Id));
        $row = $query->row_array();
        if($row['Id'] > 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }

}