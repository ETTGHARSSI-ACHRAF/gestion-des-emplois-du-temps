<?php
require_once __DIR__."/../models/user.php";
session_start();
class Loginctlr
{
    function index()
    {
        require_once __DIR__."/../views/login.php";
    }
    function auth()
    {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user=new User();
        $result = $user->read($email,$password);
        if($result!=''){
            
            foreach($result as $row)
            {
                $_SESSION['id']=$row['IdUser'];
                
            }
            header('location: http://localhost/Brief5/salle');
            
        }else
        {   
            header('location: http://localhost/Brief5/login');
        }
        
    }
}

?>