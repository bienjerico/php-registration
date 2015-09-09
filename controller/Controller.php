<?php

error_reporting(E_ALL);
session_start();


class Controller{
    
    public function __construct() {
        if(!isset($_SESSION['login']) && !$this->page_access()){
            $this->login();
        }        
    }
    
    public function index(){
        $this->login();
    }
    
    public function home(){
        header('Location: home.php');
    }
    
    public function login(){
        header('Location: login.php');
    }
    
    public function logout(){
        header('Location: logout.php');
    }
    
    public function user(){
        header('Location: user.php');
    }
    
    public function logout_process(){
        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        $this->index();
    }
    
    
    
    public function voucher_records(){
        require_once 'model/Model.php';
        $model = new Model();
        $data = $model->model_voucher_records();
        return $data;      
    }

    public function users_records(){
        require_once 'model/Model.php';
        $model = new Model();
        $data = $model->model_users_records();
        return $data;      
    }
    
    public function login_validate($array = array()){
        require_once 'model/Model.php';
        $model = new Model();
        
        $username = trim($array['username']);
        $password = trim($array['password']);
    
        
         if(empty($username) && empty($password)){
            $array['message'] = "Please enter your Username and Password";
            return $array;
        }
                
                
        if(!empty($username) && !empty($password)){
            $data   = $model->model_login_validate($array);
            $cnt = $data['cnt'];
            $user_id = $data['user_id'];
            
            if($cnt>0){
                $_SESSION['login'] = 1;
                $_SESSION['user_id'] = $user_id;
                $this->home();
            }else{
               $array['message'] = "Please verify your Username and Password";
                return $array; 
            }
        }
    }
    
    public function login_button(){
        $result = "";
        
        if(empty($_SESSION['login']) || $_SESSION['login']!=1){
            $result = "<a href=\"login.php\">Login</a>";
        }else{
            $result = "<a href=\"logout.php\">Logout</a>"; 
        }
        return $result;
    }
    
    public function login_access(){
        if(isset($_SESSION['login']) && $_SESSION['login']==1){
            $this->home();
        }
    }
    
    public function page_access(){
        
        $result = false;
        $data = $_SERVER['PHP_SELF'];
        $array = explode("/", $data);

        if($array[2]=='login.php' || $array[2]=='register.php'){
            $result = true;
        }
        return $result;
    }
   
    
    public function register_validate($array = array()){
        
        $username = $array['username'];
        $password = $array['password'];
        $conpassword = $array['conpassword'];
        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
        
   
            if(empty($username) || empty($password) || empty($conpassword) || empty($firstname) || empty($lastname)){
                $array['message']= "Please fill-up the required fields!";
                return $array;
            }

            if((!empty($password) && !empty($conpassword)) && $password!=$conpassword){
                $array['message'] = "Please validate your Password and Confirm Password!";
                return $array; 
            }

            if(!empty($username) && $this->register_username_validate($username)){
                    $array['message']= "Your Username is already existing!";
                    return $array;
            }

            if(!empty($username) && !empty($password) && !empty($conpassword) && !empty($firstname) && !empty($lastname)){
                    /* insert profile information | return profile_id */
                    $array['profile_id'] = $this->register_profile_save($array);
                    $this->register_user_save($array);

                    $array = array('message' => 'Successfuly Registered!');
                    return $array;
            }

    }
    
    public function register_username_validate($data){
        require_once 'model/Model.php';
        $model = new Model();
        
        $result = false;
        if($model->model_register_username_validate($data)>0){
            $result = true;
        }
        return $result;
        
    }
    
    public function register_profile_save($array = array()){
        require_once 'model/Model.php';
        $model = new Model();
        
        return $model->model_register_insert_profile($array);
    }
    
    public function register_user_save($array = array()){
        require_once 'model/Model.php';
        $model = new Model();
        
        return $model->model_register_insert_user($array);
    }
    
    public function profile_list(){
        require_once 'model/Model.php';
        $model = new Model();
        
        $data = $model->model_profile_list();
        
        return $data;
    }
    
    public function profile_user($id){
        require_once 'model/Model.php';
        $model = new Model();
        
        $data = $model->model_profile_user($id);
      
        return $data;
    }
    
    public function profile_validate($array = array()){
         
        
        $username = $array['username'];
        $password = $array['password'];
        $conpassword = $array['conpassword'];
        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
            
            if(empty($firstname) || empty($lastname)){
                $array['message']= "Please fill-up the required fields!";
                return $array;
            }

            if((!empty($password) && !empty($conpassword)) && $password!=$conpassword){
                $array['message'] = "Please validate your Password and Confirm Password!";
                return $array; 
            }

            
             if(!empty($firstname) && !empty($lastname)){
                    $array['user_id'] = $_SESSION['user_id'];
                    
                    $this->profile_user_update($array);

                    $array['message'] = 'Successfuly Updated!';
                    return $array;
            }
        
    }
    
    
    public function profile_user_update($array = array()){
        require_once 'model/Model.php';
        $model = new Model();
        
        return $model->model_profile_user_update($array);
    }
    
}

