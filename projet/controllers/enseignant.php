<?php
require_once __DIR__."/../models/enseignant.php";
require_once __DIR__."/../models/salle.php";
require_once __DIR__."/../models/groupe.php";
require_once __DIR__."/../models/matiere.php";
// session_start();
class Enseignantctlr
{
    function index()
    {
        if(isset($_SESSION['idE']) && !empty($_SESSION['idE'])){
        $id=$_SESSION['idE'];
        $enseignant=new Enseignant();
        $result=$enseignant->readAllCours($id);
        $groupe= new Groupe();
        $result4 = $groupe-> readAll();
        $salle= new Salle();
        $result5 = $salle->readAll();
        require_once __DIR__."/../views/enseignant.php";
        }else
        {
            header('location: http://localhost/Brief5/login');
        }
        
       
    }
    function  inscription()
    {
        $matiere= new Matiere();
        $result = $matiere->readAll();
        require_once __DIR__."/../views/inscri.php";
    }
    function creat()
    {
        
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $matiere=$_POST['matiere'];
        if(isset($_POST['inscri']) & !empty($nom)& !empty($prenom)& !empty($email) & !empty($password)& !empty($matiere))
        {
            $enseignant = new Enseignant();
            $enseignant->creat($nom,$prenom,$email,$password,$matiere);
            header('location: http://localhost/Brief5/login');   
        }
        
    }
    
    function delete($id)
    {
        if(isset($_SESSION['idE']) && !empty($_SESSION['idE'])){
        $enseignant = new Enseignant();
        $enseignant->deleteCour($id);
        header('location:http://localhost/Brief5/enseignant');
        }else
        {
            header('location: http://localhost/Brief5/login');
        }
    }
    
    function add($err="")
    {
        if(isset($_SESSION['idE']) && !empty($_SESSION['idE'])){
        $salle= new Salle();
        $result = $salle->readAll();
        $groupe= new Groupe();
        $result1 = $groupe->readAll();
        
        $erreur=$err;
        require_once __DIR__."/../views/AddCour.php";
        }else
        {
            header('location: http://localhost/Brief5/login');
        }
        
    }
    function reservation()
    {
        // $erreur='achraf';
        if(isset($_SESSION['idE']) && !empty($_SESSION['idE'])){
        $idE=$_SESSION['idE'];
        $idS=$_POST['salle'];
        $idG=$_POST['groupe'];
        $dure=$_POST['dure'];
        $date=$_POST['date'];
        $jour= date('Y-m-d');
        $capaciterS='';
        $effectifG='';
        
        if(isset($_POST['inscri'])&& !empty($idS) && !empty($idG) && !empty($dure) && !empty($date))
    {
        
        if($date>=$jour)
        {
            $salle=new Salle();
            foreach($salle->selectSalle($idS) as $Sal)
            {
                $capaciterS=$Sal['CapasiterS'];
            }
            $groupe=new Groupe();
            foreach($groupe->selectGroupe($idG) as $grp)
            {
                $effectifG=$grp['effectifG'];
            }
            // echo $effectifG;
            $enseignant = new Enseignant();
            $result1 = $enseignant->SalleDispo($date,$dure,$idS);
            $result2=$enseignant->GroupeDispo($date,$dure,$idG);
            if($result1==0){
                if($result2==0)
                {
                    if($capaciterS>=$effectifG)
                    {
                        $enseignant->reservation($idS,$idG,$idE,$date,$dure);
                        header('location:http://localhost/Brief5/enseignant');
                    }else
                    {
                        $erreur="la capasiter de cette salle est moin de effectif de ce groupe";
                       // header('location:http://localhost/Brief5/enseignant/add');
                       $this->add($erreur);
                    }
                    
                }else
                {
                    $erreur = "le groupe nest pas dispinible";
                    // header('location:http://localhost/Brief5/enseignant/add');
                    $this->add($erreur);
                }
            }else
            {
                $erreur =  "la salle nest pas dispinible";
                // header('location:http://localhost/Brief5/enseignant/add');
                $this->add($erreur);
            }            
        }else
        {
            $erreur = "choisie une date superiere ou bien egale la date de ce jour";
            
            // header('location:http://localhost/Brief5/enseignant/add');
            $this->add($erreur);
        }
    }else
    {
        header('location:http://localhost/Brief5/enseignant');
    }
}else
{
    header('location: http://localhost/Brief5/login');
}
    
}
function update()
{
    if(isset($_SESSION['idE']) && !empty($_SESSION['idE'])){
        $idE=$_SESSION['idE'];
        $idS=$_POST['salle'];
        $idG=$_POST['groupe'];
        $dure=$_POST['dure'];
        $date=$_POST['date'];
        $jour= date('Y-m-d');
        $idC=$_POST['idc'];
        $capaciterS='';
        $effectifG='';
        
    if(isset($_POST['update']) && !empty($idS) && !empty($idG) && !empty($dure) && !empty($date))
        {
        if($date>=$jour)
        {
           
            $salle=new Salle();
            foreach($salle->selectSalle($idS) as $Sal)
            {
                $capaciterS=$Sal['CapasiterS'];
            }

            $groupe=new Groupe();
            foreach($groupe->selectGroupe($idG) as $grp)
            {
                $effectifG=$grp['effectifG'];
            }
            $enseignant = new Enseignant();
            $result1 =$enseignant->SalleDispoUpdate($date,$dure,$idS,$idC);
            $result2=$enseignant->GroupeDispoUpdate($date,$dure,$idG,$idC);
            if($result1==0){
                if($result2==0)
                {
                    if($capaciterS>=$effectifG)
                    {
                        $enseignant->updateReservation($idS,$idG,$idE,$date,$dure,$idC);
                        header('location:http://localhost/Brief5/enseignant');
                        
                    }else
                    {
                        // echo '<script>alert("la capasiter de cette salle est moin de effectif de ce groupe")</script>';
                        header('location:http://localhost/Brief5/enseignant');
                    }
                    
                }else
                {
                    // echo '<script>alert("le goupe nest pas dispinible")</script>';
                    header('location:http://localhost/Brief5/enseignant');
                }
            }else
            {
                // echo '<script>alert("la salle nest pas dispinible")</script>';
                header('location:http://localhost/Brief5/enseignant');
            }            
        }else
        {
            // echo "choisie une date superiere ou bien egale la date de ce jour";
            header('location:http://localhost/Brief5/enseignant');
        }
    }else{
        header('location:http://localhost/Brief5/enseignant');
    }
}else
{
    header('location: http://localhost/Brief5/login');
}
}

}

?>