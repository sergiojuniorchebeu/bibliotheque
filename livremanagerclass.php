<?php
require_once "Model.php";
require_once "livreclass.php";
class LivreManager extends Model{
    private $livres;

    public function __construct(){
        
    }

    public function ajout_livres($livre){
        $this->livres[]= $livre;
    }

    public function get_livre(){
        return $this->livres;
    }

    public function chargementLivres(){
        $req = $this->getBdd()->prepare("Select * from livres ");
        $req->execute();
        $meslivres= $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($meslivres as $livre){
            $l= new Livre($livre['id'], $livre['titre'], $livre['nbrePages'], $livre['image']);
            $this->ajout_livres($l);
        }
    }
}
?>