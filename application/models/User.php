<?php

class User extends CI_Model{
    
    public $Id, $Username, $Password, $Firstname, $Middlename, $Lastname;

    public function __construct(){

        $this->load->database();
    }

    public function SaveUser(){

        $sql = 'Insert into Users (Username,Password,Firstname,Middlename,Lastname) values(?,?,?,?,?)';
        return $this->db->query($sql,array($this->Username,$this->Password,$this->Firstname,$this->Middlename,$this->Lastname));
    }

    public function Login_Check($username,$password){
        $sql = 'Select * from Users where Username = ? AND Password = ?';
        $query = $this->db->query($sql,array($username,$password));
        $result = $query->row();
        if(!empty($result))
        {
            $this->session->set_userdata('currentUser',$result);
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function isUsername_Valid($Un){
        $query = $this->db->query('select Id from Users where Username =' . $this->db->escape($Un));
        $row = $query->row_array();
        if($row['Id'] > 0){
            return FALSE;
        }else{
            return TRUE;
        }

    }

}