<?php
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../models/enseignant.php";
// session_start();
class Loginctlr
{
    function index()
    {
        require_once __DIR__."/../views/login.php";
    }
    function auth()
    {
        
        $email = $_POST['email'];
        $password =$_POST['password'];
        $user=new User();
        $result1 = $user->read($email,$password);
        $enseignat=new Enseignant();
        $result2 = $enseignat->read($email,$password);
        if($result1!=''){
            
            foreach($result1 as $row)
            {
                $_SESSION['id']=$row['IdUser'];
                
            }
            header('location: http://localhost/Brief5/salle');
            
        }elseif($result2!='')
        {
            foreach($result2 as $row)
            {
                // $_SESSION['enseignant']=$row;
                $_SESSION['idE']=$row['IdE'];
                $_SESSION['nomE']=$row['NomE'];
            }
            header('location: http://localhost/Brief5/enseignant');
        }else
        {   
            $_SESSION['erreurLogin']="<strong>Erreur!</strong> Login ou mot de passe incorrecte !";
            header('location: http://localhost/Brief5/login');
        }
        
    }

    function logaut()
    {
        session_unset();
        session_destroy();
        header('location: http://localhost/Brief5/login');
    }
}

?>