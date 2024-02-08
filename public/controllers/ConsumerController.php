<?php
class ConsumerController{
    public function __construct(){
        require_once 'models/consumer.php';
    }
    public function save(){
        
        if(!empty($_POST)){
            
            
            $name = isset($_POST['name'])? $_POST['name']:false;
            $last_name = isset($_POST['last_name'])? $_POST['last_name']:false;
            $email = isset($_POST['email'])? $_POST['email']:false;
            $password = isset($_POST['password'])? $_POST['password']:false;

            //for errors
            $_SESSION['form_name']=$name;
            $_SESSION['form_last_name']=$last_name;
            $_SESSION['form_email']=$email;
            $_SESSION['form_password']=$password;

            $consumer = new Consumer();
            $consumer->setName($name);
            $consumer->setLastName($last_name);
            $consumer->setEmail($email);
            $consumer->setPassword($password);

            $save = $consumer->save();

            if($save){
                $_SESSION['register'] = 'complete';
            }else{
                $_SESSION['register'] = 'failed';
            }


        }else{
            $_SESSION['register'] = 'failed';
        }
        echo "<script>window.location.href=\"?controller=Consumer&&action=register\"</script>";
    }

    public function register(){
        require_once 'views/consumer/register.php';
    }

    public function login(){
        require_once 'views/consumer/login.php';
    }

    public function postLogin(){

        $_SESSION['login'] = 'failed';
        if(!empty($_POST)){
            $consumer = new Consumer();
            $consumer->setEmail($_POST['email']);
            $consumer->setPasswordLogin($_POST['password']);
        }
        $verify = $consumer->checkLogin();
        if($verify){
            $_SESSION['identity'] = $verify;
            echo "<script>window.location.href=\"controller=Note&&action=list\"</script>";
        }
    }
}
