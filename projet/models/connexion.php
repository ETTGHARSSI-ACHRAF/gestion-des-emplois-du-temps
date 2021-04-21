<?php
class Connexion{
    private $host="localhost";
    private $database="gestiondeemploidutemps";
    private $user="root";
    private $password="";
    private $con;
    private $query;

    public function __construct(){
        try {
            $this->con=new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->user,$this->password);
        } catch (PDOException $e) {
            print "ERREUR : ".$e->getMessage()."<br/>";
        }   
    }
    public function query($var){
        $this->query=$this->con->prepare($var);
    }
    public function execute(){
        $this->query->execute();
    }
    public function selectAll(){
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function singleligne(){
        return $this->query->rowCount();
    }
}
?>