<?php

class Diary extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Post');
    }

    public function index(){
        
        if(!empty($this->session->userdata('currentUser'))){
            
            $data['Posts'] = $this->Post->RetrieveAllPost($this->session->userdata('currentUser')->Id);
            $data['view'] = 'Diary/mainDiary';
            $data['title'] = 'Your Secret Diary | My Diary';
            $this->load->view('templates/diary_template',$data);

        }else{
            redirect(base_url('Account/Login'));
        }
    }

    public function addnew(){

        if(!empty($this->session->userdata('currentUser'))){

        $data['view'] = 'Diary/addnew';
        $data['title'] = 'Your Secret Diary | Add New';
        $this->load->view('templates/template',$data);

        }else{
            redirect(base_url('Account/Login'));
        }
    }

    public function AddNewAction(){

        if(!empty($this->session->userdata('currentUser'))){

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');
            $this->form_validation->set_rules('datepost','Date Post','required|callback_Check_DatePost');

            if($this->form_validation->run()){

                $this->Post->Title =  $this->encryption->encrypt($this->input->post('title'));
                $this->Post->Body = $this->encryption->encrypt($this->input->post('body'));
                $this->Post->DatePost = $this->input->post('datepost');
                $this->Post->UserId = $this->session->userdata('currentUser')->Id;
                $result = $this->Post->SavePost();

                if($result){
                    redirect(base_url('Diary'));
                }else{
                    $this->addnew();
                }
            }else{
                $this->addnew();
            }
        }else{
            redirect(base_url('Account/Login'));
        }  
    }

    public function DeletePost($PId){
        if(!empty($this->session->userdata('currentUser'))){
            if($this->Post->DeletePost($PId,$this->session->userdata('currentUser')->Id)){
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            redirect(base_url('Account/Login'));
        }
    }

    public function EditPost($id){

        if(!empty($this->session->userdata('currentUser'))){

            $retievePost = $this->Post->RetrievePost($id,$this->session->userdata('currentUser')->Id);

            $data['view'] = 'Diary/editPost';
            $data['title'] = 'Your Secret Diary | Edit Post';
            $data['title'] = $this->encryption->decrypt($retievePost->Title);
            $data['body'] = $this->encryption->decrypt($retievePost->Body);
            $data['datepost'] = $retievePost->DatePost;
            $data['id'] = $id;
            $this->load->view('templates/template',$data);

        }else{
            redirect(base_url('Account/Login'));
        } 
    }

    public function EditPostAction($id){
        
        if(!empty($this->session->userdata('currentUser'))){

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');
            $this->form_validation->set_rules('datepost','Date Post','required');

            if($this->form_validation->run()){

                $title = $this->encryption->encrypt($this->input->post('title'));
                $body = $this->encryption->encrypt($this->input->post('body'));
                $datepost = $this->input->post('datepost');
                $user = $this->session->userdata('currentUser')->Id;
                $res = $this->Post->UpdatePost($title,$body,$datepost,$id,$user);
                if($res){
                    redirect(base_url('Diary'));
                }else{
                    $this->EditPost();
                }
            }else{
                $this->EditPost();
            }
        }else{
            redirect(base_url('Account/Login'));
        }
        
    }

    public function Check_DatePost($date){

        if(!$this->Post->IsDate_Valid($date)){
            $this->form_validation->set_message('Check_DatePost','You already have a post in this date');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}