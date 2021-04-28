<?php
require_once 'connexion.php';
class User
{
    private $id;
    private $name;
    private $prenom;
    private $email;
    private $password;
    private $db;

    function __construct(){
        $this->db=new Connexion();
    }
    function read($email,$password){
        $this->email=$email;
        $this->password=$password;
        $this->db->query("SELECT * FROM `utilisateur` WHERE EmailUser='".$this->email."' AND password='".$this->password."'");
        $this->db->execute();
        if($this->db->singleligne()==1){
            return $this->db->selectAll();
        }
    }
}
?>