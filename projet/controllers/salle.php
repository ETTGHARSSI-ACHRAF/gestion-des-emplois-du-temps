<?php
require_once __DIR__."/../models/salle.php";
session_start();
class Sallectlr
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
            require_once __DIR__."/../views/salle.php";
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
            
            require_once __DIR__."/../views/AddSalle.php";
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
            $salle = new Salle();
            $i=0;
            while(isset($_POST['name'.$i])){
                $salle->creat($_POST['name'.$i],$_POST['capaciter'.$i]);
                $i++;
            }
            header('location:http://localhost/Brief5/salle');
            
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
            $salle=new Salle();
            $salle->delete($id);
            header('location:http://localhost/Brief5/salle');
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
        $capaciter="";
        $ids="";
        $salle=new Salle();
       $result = $salle->selectSalle($id);
       foreach($result as $row){
         $ids=$row['IdS'];  
        $name=$row['LibelleS'];
        $capaciter=$row['CapasiterS'];
       }
       require_once __DIR__."/../views/UpdateSalle.php";
     
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
            if(isset($_POST['update']) & !empty($name)& !empty($capaciter)){
                $salle=new Salle();
                $salle->updatesale($id,$name,$capaciter);
            }
                header('location: http://localhost/Brief5/salle');
            
        
    }else
    {
        header('location: http://localhost/Brief5/');
    }
    }
    function close()
    {
        $getsession = self::Fsession();
        if($getsession == true)
        {
            header('location: http://localhost/Brief5/salle');
    }else
    {
        header('location: http://localhost/Brief5/');
    }
    }

    function red()
    {   $getsession = self::Fsession();
        if($getsession == true)
        {
            $salle=new Salle();
            return $salle-> readAll();
        }else
        {
            header('location: http://localhost/Brief5/');
        }
    } 
}
?>