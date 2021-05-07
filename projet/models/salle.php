<?php
require_once 'connexion.php';
class Salle
{
    private $id;
    private $lebelle;
    private $capacite;
    private $db;
    function __construct()
    {
       $this->db=new Connexion();
    }
    
    function creat($lebelle,$capacite)
    {
        
        $this->lebelle=$lebelle;
        $this->capacite=$capacite;
        $this->db->query("INSERT INTO `salle`(`LibelleS`, `CapasiterS`) VALUES ('".$this->lebelle."',".$this->capacite.")");
        $this->db->execute();
    }
    function updatesale($id,$lebelle,$capacite)
    {
        $this->id=$id;
        $this->lebelle=$lebelle;
        $this->capacite=$capacite;
        $this->db->query("UPDATE `salle` SET `LibelleS`='".$this->lebelle."',`CapasiterS`=".$this->capacite." WHERE IdS=".$this->id);
        $this->db->execute();
    }
    function delete($id){
        $this->id=$id;
        $this->db->query("DELETE FROM `salle` WHERE IdS=".$this->id);
        $this->db->execute();
    }
    function readAll(){
        $this->db->query("SELECT * FROM `salle`");
        $this->db->execute();
        return $this->db->selectAll();
    }
    
    function selectSalle($id)
    {
        $this->id=$id;
        $this->db->query("SELECT * FROM `salle` WHERE IdS=".$this->id);
        $this->db->execute();
        return $this->db->selectAll();
    }
}
?>