<?php
defined("BASEPATH") or exit ("No direct scripts allowed"); 

class Dashboard extends CI_Controller
{

    private $sessionUser;

    public function __construct(){

        parent::__construct();
        $this->load->helper("url"); 
        $this->load->library("session");

        $this->sessionUser = $this->session->userdata("user");
    }


    public function index()
    {  
        if($this->sessionUser !=null){
            $data['user'] = $this->sessionUser;
            $this->load->view("template/header");
            $this->load->view("dashboard", $data);
            $this->load->view("template/footer");
        }else{
            redirect();

        }
    }



}   
