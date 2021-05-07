<?php
require_once 'connexion.php';
class Enseignant
{
    private $id;
    private $name;
    private $prenom;
    private $email;
    private $password;
    private $matiere;
    private $db;
    public function __construct()
   {
        $this->db=new Connexion();
   }
    public function creat($nom,$prenom,$email,$password,$matiere)
   {
        $this->matiere=$matiere;
        $this->password=$password;
        $this->email=$email;
        $this->prenom=$prenom;
        $this->name=$nom;
        $this->db->query("INSERT INTO `enseignant`(`NomE`, `PrenomE`, `EmailE`, `PasswordE`, `IdM`) VALUES ('".$this->name."','".$this->prenom."','".$this->email."','".$this->password."',".$this->matiere.")");
        $this->db->execute();
   }
   function read($email,$password){
     $this->email=$email;
     $this->password=$password;
     $this->db->query("SELECT * FROM `enseignant` WHERE EmailE='".$this->email."' AND PasswordE='".$this->password."'");
     $this->db->execute();
     if($this->db->singleligne()==1){
         return $this->db->selectAll();
     }
}

     function readAllCours($id){
          $this->id=$id;
        $this->db->query("SELECT cour.IdC,cour.DateC,cour.DureC,groupe.LibelleG,salle.LibelleS,groupe.effectifG FROM cour,groupe,salle,enseignant WHERE cour.IdS=salle.IdS AND cour.IdG=groupe.IdG AND cour.IdE=enseignant.IdE AND enseignant.IdE=".$this->id." ORDER BY cour.DateC ASC  ");
        $this->db->execute();
        return $this->db->selectAll();
     }
     function deleteCour($idC)
     {
          $this->db->query("DELETE FROM `cour` WHERE IdC=".$idC);
          $this->db->execute();
     }
     function SalleDispo($date,$dure,$salle)
     {
          $this->db->query("SELECT cour.IdC FROM salle,cour WHERE salle.IdS=cour.IdS AND salle.IdS=".$salle." AND DateC='".$date."' AND DureC=".$dure);
          $this->db->execute();
          return $this->db->singleligne();     
     }
     function GroupeDispo($date,$dure,$groupe)
     {
          $this->db->query("SELECT cour.IdC FROM groupe,cour WHERE groupe.IdG=cour.IdG AND groupe.IdG=".$groupe." AND DateC='".$date."' AND DureC=".$dure);
          $this->db->execute();
          return $this->db->singleligne();
     }
     function SalleDispoUpdate($date,$dure,$idS,$idC)
     {
          $this->db->query("SELECT cour.IdC FROM salle,cour WHERE salle.IdS=cour.IdS AND salle.IdS=".$idS." AND DateC='".$date."' AND DureC=".$dure." and IdC<>".$idC);
          $this->db->execute();
          return $this->db->singleligne();     
     }
     function GroupeDispoUpdate($date,$dure,$idG,$idC)
     {
          $this->db->query("SELECT cour.IdC FROM groupe,cour WHERE groupe.IdG=cour.IdG AND groupe.IdG=".$idG." AND DateC='".$date."' AND DureC=".$dure." and IdC<>".$idC);
          $this->db->execute();
          return $this->db->singleligne();
     }
     function reservation($idS,$idG,$idE,$date,$dure)
     {
          $this->db->query("INSERT INTO `cour`(`IdS`, `IdG`, `IdE`, `DateC`, `DureC`) VALUES (".$idS.",".$idG.",".$idE.",'".$date."',".$dure.")");
          $this->db->execute();
     }
     function updateReservation($idS,$idG,$idE,$date,$dure,$idC)
     {
          $this->db->query("UPDATE `cour` SET `IdS`=".$idS.",`IdG`=".$idG.",`IdE`=".$idE.",`DateC`='".$date."',`DureC`=".$dure." WHERE IdC=".$idC);
          $this->db->execute();
     }
}
?>