<?php

require_once("modele/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct()
    {
        $this->unModele = new Modele();
    }

    //***************gestion client ************/
    public function insertClient($tab)
    {
        $this->unModele->insertClient($tab);
    }
    public function selectAllClient()
    {
        return $this->unModele->selectAllClient();
    }
    public function selectLikeClient($filtre)
    {
        return $this->unModele->selectLikeClient($filtre);
    }
    public function selectWhereClient($idclient)
    {
        return $this->unModele->selectWhereClient($idclient);
    }
    public function updateClient($tab)
    {
        return $this->unModele->updateClient($tab);
    }
    public function deleteClient($idclient)
    {
        return $this->unModele->deleteClient($idclient);
    }

     //***************gestion technicien ************/
    public function insertTechnicien($tab)
    {
        $this->unModele->insertTechnicien($tab);
    }

    public function selectAllTechnicien()
    {
        return $this->unModele->selectAllTechnicien();
    }
    public function selectLikeTechnicien($filtre)
    {
        return $this->unModele->selectLikeTechnicien($filtre);
    }
    public function selectWhereTechnicien($idtechnicien)
    {
        return $this->unModele->selectWhereTechnicien($idtechnicien);
    }
    public function updateTechinicien($tab)
    {
        return $this->unModele->updateTechinicien($tab);
    }
    public function deleteTechnicien($idtechnicien)
    {
        return $this->unModele->deleteTechnicien($idtechnicien);
    }
    public function selectProdInterTech($idtechnicien)
    {
        return $this->unModele->selectProduitClient($idtechnicien);
    }

    public function primeTechnicien($idtechnicien)
    {
        return $this->unModele->primeTechnicien($idtechnicien);
    }

        //***************gestion intervention ************/
    public function insertIntervention($tab)
    {
        $this->unModele->insertIntervention($tab);
    }

    public function selectAllIntervention()
    {
        return $this->unModele->selectAllIntervention();
    }

    public function selectWhereInter($idinter)
    {
        return $this->unModele->selectWhereInter($idinter);
    }

    public function updateInter($tab)
    {
        return $this->unModele->updateInter($tab);
    }

    public function deleteInter($idinter)
    {
        return $this->unModele->deleteInter($idinter);
    }

        //***************gestion produit ************/
    public function insertProduit($tab)
    {
        $this->unModele->insertProduit($tab);
    }

    public function selectAllProduit()
    {
        return $this->unModele->selectAllProduit();
    }
    
    public function selectProduitClient($idclient)
    {
        return $this->unModele->selectProduitClient($idclient);
    }

    public function selectWhereProduit($idproduit)
    {
        return $this->unModele->selectWhereProduit($idproduit);
    }

    public function updateProduit($tab)
    {
        return $this->unModele->updateProduit($tab);
    }

    public function deleteProduit($idproduit)
    {
        return $this->unModele->deleteProduit($idproduit);
    }

    //////////////////////////////////////////////////////////////
    public function count($table)
    {
        return $this->unModele->count($table);
    }
    
    public function verifConnexion($email, $mdp)
    {
        //$mdp = sha1($mdp);
        return $this->unModele->verifConnexion($email, $mdp);
    }
}