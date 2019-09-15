<?php

class Home extends CI_Controller{

    public function index(){

        //$data['view'] = 'Home/_homeindex';
        //$data['title'] = 'Your Secret Diary | Home';
        $this->load->view('home/index');

    }
}