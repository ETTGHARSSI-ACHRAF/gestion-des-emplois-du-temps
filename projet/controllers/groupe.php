<?php
require_once __DIR__."/../models/groupe.php";
// session_start();
class Groupectlr
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
            $groupe=new Groupe();
            $result = $groupe-> readAll();
            require_once __DIR__."/../views/groupe.php";
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
            
            require_once __DIR__."/../views/AddGroupe.php";
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
            $groupe = new Groupe();
            $i=0;
            while(isset($_POST['name'.$i])){
                $groupe->creat($_POST['name'.$i],$_POST['capaciter'.$i]);
                $i++;
            }
            header('location:http://localhost/Brief5/groupe');
            
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
            $groupe=new Groupe();
            $groupe->delete($id);
            header('location:http://localhost/Brief5/groupe');
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
        $groupe=new Groupe();
       $result = $groupe->selectGroupe($id);
       foreach($result as $row){
         $ids=$row['IdG'];  
        $name=$row['LibelleG'];
        $capaciter=$row['effectifG'];
       }
       require_once __DIR__."/../views/UpdateGroupe.php";
     
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
                $groupe=new Groupe();
                $groupe->updateGroupe($id,$name,$capaciter);
            }
                header('location: http://localhost/Brief5/groupe');
            
        
    }else
    {
        header('location: http://localhost/Brief5/');
    }
    }

    // function red()
    // { 
    //         $groupe=new Groupe();
    //         return $groupe-> readAll();
    // } 

}
?>