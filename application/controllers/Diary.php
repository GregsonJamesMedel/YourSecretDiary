<?php

class Diary extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        
        if(!empty($this->session->userdata('currentUser'))){

            $this->load->model('Post');
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

            $this->load->model('Post');

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');
            $this->form_validation->set_rules('datepost','Date Post','required');

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
            $this->load->model('Post');
            if($this->Post->DeletePost($PId,$this->session->userdata('currentUser')->Id)){
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            redirect(base_url('Account/Login'));
        }

       
    }

}