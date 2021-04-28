<?php
require_once 'connexion.php';
class Matiere
{
   private $db;
   private $id;
   private $nom;
   
   public function __construct()
   {
        $this->db=new Connexion();
   }
   public function creat($nom)
   {
        $this->nom=$nom;
        $this->db->query("INSERT INTO `matiere`(`LibelleM`) VALUES ('".$this->nom."')");
        $this->db->execute();
   }
   function updateMatiere($id,$nom)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->db->query("UPDATE `matiere` SET `LibelleM`='".$this->nom."' WHERE IdM=".$this->id);
        $this->db->execute();
    }
    function delete($id){
        $this->id=$id;
        $this->db->query("DELETE FROM `matiere` WHERE IdM=".$this->id);
        $this->db->execute();
    }
    function readAll(){
        $this->db->query("SELECT * FROM `matiere`");
        $this->db->execute();
        return $this->db->selectAll();
    }
    function selectMatiere($id)
    {
        $this->id=$id;
        $this->db->query("SELECT * FROM `matiere` WHERE IdM=".$this->id);
        $this->db->execute();
        return $this->db->selectAll();
    }
}
?>