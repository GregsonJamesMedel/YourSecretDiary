<?php

class YSD_Api extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Post');
    }

    //http://YourSecretDiary/Api/YSD_Api/GetPost/PostId/UserID
    public function GetPost($PId,$UId){
        $post_arr = array();
        $result = $this->Post->RetrievePost($PId,$UId);
        $post_arr['data'] = (array)$result;

        if($result != null){
            
            echo json_encode($post_arr);
 
        }else{
 
            http_response_code(404);
            echo '404 not found';
 
        }
    }

    //http://YourSecretDiary/Api/YSD_Api/GetAllPost/UserID
    public function GetAllPost($Id){
        $post_arr = array();
        $result = $this->Post->RetrieveAllPost($Id);
        $post_arr['data'] = (array)$result;
    
       if($result != null){

           echo json_encode($post_arr);

       }else{

           http_response_code(404);
           echo '404 not found';

       }

    }

    public function NewPost(){
        echo $this->input->post('Title');
        echo $this->input->post('Body');
        echo $this->input->post('DatePost');
        echo $this->input->post('UserId');

    }

}