<?php
require_once 'connexion.php';
class Groupe
{
   private $db;
   private $id;
   private $nom;
   private $effectif;
   
   public function __construct()
   {
        $this->db=new Connexion();
   }
   public function creat($nom,$effectif)
   {
        $this->nom=$nom;
        $this->effectif=$effectif;
        $this->db->query("INSERT INTO `groupe`(`LibelleG`, `effectifG`) VALUES ('".$this->nom."',".$this->effectif.")");
        $this->db->execute();
   }
   function updateGroupe($id,$nom,$effectif)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->effectif=$effectif;
        $this->db->query("UPDATE `groupe` SET `LibelleG`='".$this->nom."',`effectifG`=".$this->effectif." WHERE IdG=".$this->id);
        $this->db->execute();
    }
    function delete($id){
        $this->id=$id;
        $this->db->query("DELETE FROM `groupe` WHERE IdG=".$this->id);
        $this->db->execute();
    }
    function readAll(){
        $this->db->query("SELECT * FROM `groupe`");
        $this->db->execute();
        return $this->db->selectAll();
    }
    function selectGroupe($id)
    {
        $this->id=$id;
        $this->db->query("SELECT * FROM `groupe` WHERE IdG=".$this->id);
        $this->db->execute();
        return $this->db->selectAll();
    }
}
?>