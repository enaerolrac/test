<?php
defined('BASEPATH') or exit("No direct script access allowed");

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("UserModel");
        $this->load->library("session");
        
        $this->sessionUser = $this->session->userdata("user");
    }
    

    public function index()
    {
        if ($this->sessionUser !=null) {
            redirect("dashboard");
        } else {
            $this->load->view("template/header");
            $this->load->view("login");
            $this->load->view("template/footer");
        }
            
    }

    #regionLOGIN
    public function login()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = $this->UserModel->authenticate($username, $password);
        if ($user == null){
            $this->session->set_flashdata("response", true);
            $this->session->set_flashdata("message", "Invalid account!");
            redirect();
        } else {
            $this->session->set_userdata(array("user" => $user));
            redirect("dashboard");
        }
        
    }
    #endregion

    #region LOGOUT
    public function logout()
    {
        if ($this->sessionUser !=null){
            $this->session->sess_destroy();
            redirect();
        }
    }
    #endregion

    #region ADD ROLE
    public function addRole()
    {
        $data = $_POST;
        $res = $this->UserModel->insert($data);
        if($res){
            echo json_encode (array(
                "status"=>true,
                "message"=> "success"
            ));
        }else{
            echo json_encode(array(
                "status"=>false,
                "message"=>"failed"
            ));
        }

    }
    #endregion

    #region
    public function loadRoles()
    {
        echo json_encode($this->UserModel->getRoles());
    }
    #endregion

    #region ADD user
    public function addUser()
    {
        // var_dump($_FILES);
        // var_dump($_POST);

        $data= $_POST;
        $userTable = $this->db->list_fields('users');
        foreach ($data as $key => $value) {        
            $index = array_search($key, $userTable);                   
            if($index === false){
                unset($data[$key]);
             }
           
        }
        //uploading image
        if($_FILES['user_image']['name'] == "")
        {
            $date = new DateTime();
            $filename = $_POST["first_name"] . $date->getTimestamp() . ".jpeg";
            $this->createImage($_POST['dataURI'], "users", $filename);  
                
        }else{
        //upload image
            $filename = $_FILES['user_image']['name'];
            move_uploaded_file($_FILES['user_image']['tmp_name'], "./assets/images/users/" .$filename);
        }//uploading imae
        
        $data['password'] = hash('sha512', $_POST['password']);
        $res = $this->UserModel->addUser($data);
        if($res){
            echo json_encode(array(
                "status" => true,
                "message" => "success"
            ));
            return;
        }
        echo json_encode(array(
            "status" => false,
            "message" => "failed"
        ));
    }


    //#region create image
    public function createImage($img, $dir, $filename)
    {
        $data = base64_decode(preg_replace("#^data:image/\w+;base64,#i", "", $img));
        file_put_contents("./assets/images/" . $dir . "/" . $filename, $data);
        $data['image'] = $filename;
    }
    //#endregion
}