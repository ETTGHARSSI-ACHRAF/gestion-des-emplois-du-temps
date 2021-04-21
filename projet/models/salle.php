<?php
require_once 'connexion.php';
class Salle
{
    private $id;
    private $lebelle;
    private $capacite;

    function __construct()
    {
        $con=new Connexion();
    }
    
    function creat($id,$lebelle,$capacite)
    {
        $this->id=$id;
        $this->lebelle=$lebelle;
        $this->capacite=$capacite;
        $con->query();
        $con->execute();
    }
}
?>