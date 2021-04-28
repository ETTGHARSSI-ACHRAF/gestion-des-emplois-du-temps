<?php
require_once __DIR__."/../models/matiere.php";
session_start();
class Matierectlr
{
    static function Fsession()
    {
        if($_SESSION['id']!=''){
            return true;
        }
    }
    function index()
    {
        $getsession = self::Fsession();
        if($getsession == true)
        {
            require_once __DIR__."/../views/matiere.php";
        }else
        {
            header('location: http://localhost/Brief5/');
        }
    }
    function add()
    {
        $getsession = self::Fsession();
        if($getsession == true)
        {
            
            require_once __DIR__."/../views/AddMatiere.php";
        }else
        {
            header('location: http://localhost/Brief5/');
        }
        
    }
    function saveAdd()
    {
        $getsession = self::Fsession();
        if($getsession == true)
        {
            $matiere = new Matiere();
            $i=0;
            while(isset($_POST['name'.$i])){
                $matiere->creat($_POST['name'.$i]);
                $i++;
            }
            header('location:http://localhost/Brief5/matiere');
            
        }else
        {
            header('location: http://localhost/Brief5/');
        }
    }
    function delet($id)
    {
    
    $getsession = self::Fsession();
        if($getsession == true)
        {
            $matiere=new Matiere();
            $matiere->delete($id);
            header('location:http://localhost/Brief5/matiere');
        }else
        {
            header('location: http://localhost/Brief5/');
        }
    }


    function update($id)
    {
        $getsession = self::Fsession();
        if($getsession == true)
        {
        $name="";
        $ids="";
        $matiere=new Matiere();
       $result = $matiere->selectMatiere($id);
       foreach($result as $row){
         $ids=$row['IdM'];  
        $name=$row['LibelleM'];
       }
       require_once __DIR__."/../views/UpdateMatiere.php";
     
    }else
    {
        header('location: http://localhost/Brief5/');
    }
    }
    function saveUpdate()
    {   
        $getsession = self::Fsession();
        if($getsession == true)
        {
                $name=$_POST['name'];
                $capaciter =$_POST['capaciter'];
                $id=$_POST['id'];
            if(isset($_POST['update']) & !empty($name)){
                $matiere=new Matiere();
                $matiere->updateMatiere($id,$name);
            }
                header('location: http://localhost/Brief5/matiere');
            
        
    }else
    {
        header('location: http://localhost/Brief5/');
    }
    }
    // function close()
    // {
    //     $getsession = self::Fsession();
    //     if($getsession == true)
    //     {
    //         header('location: http://localhost/Brief5/salle');
    // }else
    // {
    //     header('location: http://localhost/Brief5/');
    // }
    // }

    function red()
    {   $getsession = self::Fsession();
        if($getsession == true)
        {
            $matiere=new Matiere();
            return $matiere-> readAll();
        }else
        {
            header('location: http://localhost/Brief5/');
        }
    } 
}
?>