<?php

class Account extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->library('form_validation');
    }

    public function Login($wrong = FALSE){

        $data['wrongUserPass'] = $wrong;
        $data['view'] = 'Account/Login';
        $data['title'] = 'Your Secret Diary | Login';
        $this->load->view('templates/template',$data);
    }

    public function LoginAction(){

        $this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[25]');

        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('User');

            if($this->User->Login_Check($username,$password)){
                redirect(base_url('Diary'));
            }else{
                $this->Login();
            }
        }else{
            $this->Login(TRUE);
        }
    }

    public function Logout(){

        if($this->session->userdata('currentUser')){
            $this->session->unset_userdata('currentUser');
            redirect(base_url());
        }
    }

    public function Register(){

        if(!empty($this->session->userdata('currentUser'))){
            redirect(base_url('Diary'));
        }else{
            $data['view'] = 'Account/Register';
            $data['title'] = 'Your Secret Diary | Register';
            $this->load->view('templates/template',$data);
        }
    }

    public function RegistrationAction(){

        if(!empty($this->session->userdata('currentUser'))){
            redirect(base_url('Diary'));
        }else{
            $this->SetValidationRules();
            
            if($this->form_validation->run()){

                $this->load->model('User');
                $this->User->Username = $this->input->post('username');
                $this->User->Password = $this->input->post('password');
                $this->User->Firstname = $this->input->post('firstname');
                $this->User->Middlename = $this->input->post('middlename');
                $this->User->Lastname = $this->input->post('lastname');
            
                if(!$this->User->SaveUser()){

                    $data['view'] = 'errors/error.php';
                    $data['title'] = 'Your Secret Diary | Error';
                    $this->load->view('templates/template',$data);

                }

                $data['view'] = 'Account/RegistrationSuccess';
                $data['title'] = 'Your Secret Diary | Registration Success';
                $this->load->view('templates/template',$data);

            }else{
                $this->Register();
            }
        }
    }
  
    private function SetValidationRules(){

        $this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[25]|callback_Username_Check');
        $this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('firstname','Firstname','required|min_length[2]|max_length[25]');
        $this->form_validation->set_rules('middlename','Middlename','max_length[25]');
        $this->form_validation->set_rules('lastname','Lastname','required|min_length[5]|max_length[25]');
        
    }

    public function Username_Check($user){
        $this->load->model('User');

        if(!$this->User->isUsername_Valid($user)){
            $this->form_validation->set_message('Username_Check','Username already exist!');
            return FALSE;
        }else{
            return TRUE;
        }
    }



}