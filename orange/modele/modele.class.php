<?php

class Modele
{
    private $unPDO;
    
    public function __construct()
    {
        try
        {
            $url = "mysql:host=localhost;dbname=orange_efrei";
            $user = "root";
            $mdp = "";
            $this->unPDO = new PDO($url, $user, $mdp);
        }
        catch (PDOException $e)
        {
            echo"erreur connexion BDD : ". $e->getMessage();
        }
    }

    //***************** gestion client ************/
    public function insertClient($tab)
    {
        $requete = "insert into client values (null, :nom, :prenom, :adresse, :email);";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":adresse"=>$tab['adresse'],
            ":email"=>$tab['email']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }

    public function selectAllClient()
    {
        $requete = "select * from client;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    public function selectLikeClient($filtre)
    {
        $requete = "select * from client where nom like :filtre or prenom like :filtre or adresse like :filtre or email like :filtre;";

        $donnee = array(":filtre" => "". "$filtre". "%");

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }
    public function selectWhereClient($idclient)
    {
        $requete = "select * from client where idclient = :idclient;";

        $donnee = array(":idclient"=>$idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }

    public function updateClient($tab)
    {
        $requete = "update client set nom = :nom, prenom = :prenom, adresse = :adresse, email = :email where idclient = :idclient;";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":adresse"=>$tab['adresse'],
            ":email"=>$tab['email'],
            ":idclient"=>$tab['idclient']
        );

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }
    
    public function deleteClient($idclient)
    {
        $requete = "delete from client where idclient = :idclient;";

        $donnee = array(":idclient"=>$idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }


    //***************** gestion technicien ************/
    public function insertTechnicien($tab)
    {
        $requete = "insert into technicien values (null, :nom, :prenom, :specialite, :dateEmbauche);";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":specialite"=>$tab['specialite'],
            ":dateEmbauche"=>$tab['dateEmbauche']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }

    public function selectAllTechnicien()
    {
        $requete = "select * from technicien;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }
    public function selectLikeTechnicien($filtre)
    {
        $requete = "select * from technicien where nom like :filtre or prenom like :filtre;";

        $donnee = array(":filtre" => "". "$filtre". "%");

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }
    public function selectWhereTechnicien($idtechnicien)
    {
        $requete = "select * from technicien where idtechnicien = :idtechnicien;";

        $donnee = array(":idtechnicien"=>$idtechnicien);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }
    public function updateTechinicien($tab)
    {
        $requete = "update technicien set nom = :nom, prenom = :prenom, specialite = :specialite where idtechnicien = :idtechnicien;";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":specialite"=>$tab['specialite'],
            ":idtechnicien"=>$tab['idtechnicien']
        );

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }
    public function deleteTechnicien($idtechnicien)
    {
        $requete = "delete from technicien where idtechnicien = :idtechnicien;";

        $donnee = array(":idtechnicien"=>$idtechnicien);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }
    public function primeTechnicien($idtechnicien)
    {
        $requete = "select idtechnicien, nom from technicien where idtechnicien = :idtechnicien";

        $donnee = array(":idtechnicien"=>$idtechnicien);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /*public function selectProdInterTech($idtechnicien)
    {
        $requete = "select * from vinter where idproduit = :idproduit and idtechnien = :idtehnicien;";

        $donnee = array(":idtechnicien" => $idtechnicien);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }*/

    //***************** gestion intervention ************/
    public function insertIntervention($tab)
    {
        $requete = "insert into intervention(description, prixInter, dateInter, idproduit, idtechnicien) values (:description, :prixInter, :dateInter, :idproduit, :idtechnicien);";

        $donnee = array(
            ":description"=>$tab['description'],
            ":prixInter"=>$tab['prixInter'],
            ":dateInter"=>$tab['dateInter'],
            ":idproduit"=>$tab['idproduit'],
            ":idtechnicien"=>$tab['idtechnicien']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }
    
    public function selectAllIntervention()
    {
        $requete = "select * from vinter;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    public function selectWhereInter($idinter)
    {
        $requete = "select inter.idinter, inter.description , inter.prixInter, inter.dateInter, prod.designation, tech.idtechnicien, tech.nom, tech.prenom 
        from intervention inter join produit prod on inter.idproduit = prod.idproduit
        left join technicien tech on inter.idtechnicien = tech.idtechnicien
        WHERE inter.idinter = :idinter;";

        $donnee = array(":idinter"=>$idinter);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }

    public function updateInter($tab)
    {
        $requete = "update intervention set description = :description, prixInter = :prixInter, dateInter = :dateInter, idproduit = :idproduit, idtechnicien = :idtechnicien where idinter = :idinter;";

        $donnee = array(
            ":description"=>$tab['description'],
            ":prixInter"=>$tab['prixInter'],
            ":dateInter"=>$tab['dateInter'],
            ":idproduit"=>$tab['idproduit'],
            ":idtechnicien"=>$tab['idtechnicien'],
            ":idinter"=>$tab['idinter']
        );

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }

    public function deleteInter($idinter)
    {
        $requete = "delete from intervention where idintervention = :idinter;";

        $donnee = array(":idinter"=>$idinter);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }

    //***************** gestion produit ************/
    public function insertProduit($tab)
    {
        $requete = "insert into produit (designation, prixAchat, dateAchat, categorie, idclient) values (:designation, :prixAchat, :dateAchat, :categorie, :idclient);";

        $donnee = array(
            ":designation"=>$tab['designation'],
            ":prixAchat"=>$tab['prixAchat'],
            ":dateAchat"=>$tab['dateAchat'],
            ":categorie"=>$tab['categorie'],
            ":idclient"=>$tab['idclient']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }

    public function selectAllProduit()
    {
        $requete = "select * from vprod;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    public function selectProduitClient($idclient)
    {
        $requete = "select * from vprod where idclient = :idclient;";

        $donnee = array(":idclient" => $idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }

    public function selectWhereProduit($idproduit)
    {
        $requete = "select prod.idproduit, prod.designation, prod.prixAchat, prod.dateAchat, prod.categorie, cli.idclient, cli.nom, cli.prenom
        from produit prod join client cli ON cli.idclient = prod.idclient
        where prod.idproduit = :idproduit;";

        $donnee = array(":idproduit"=>$idproduit);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }

    public function updateProduit($tab)
    {
        $requete = "update produit set designation = :designation, prixAchat = :prixAchat, dateAchat = :dateAchat, categorie = :categorie, idclient = :idclient where idproduit = :idproduit;";
    
        $donnee = array(
            ":designation"=>$tab['designation'],
            ":prixAchat"=>$tab['prixAchat'],
            ":dateAchat"=>$tab['dateAchat'],
            ":categorie"=>$tab['categorie'],
            ":idclient"=>$tab['idclient'],
            ":idproduit"=>$tab['idproduit']
        );
    
        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }

    public function deleteProduit($idproduit)
    {
        $requete = "delete from produit where idproduit = :idproduit;";

        $donnee = array(":idproduit"=>$idproduit);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }

    /*public function selectClientProd($idproduit)
    {
        $requete = "select * from client where idclient = :idclient;";

        $donnee = array(":idproduit"=>$idproduit);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }*/

    //////////////////////////////////////////////////////////
    public function count($table)
    {
        $requete = "select count(*) as nb from " .$table;

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetch();
    }
    
    public function verifConnexion($email, $mdp)
    {
        $requete = "select * from user where email = :email and mdp = :mdp;";

        $donnee = array(':email' => $email, ':mdp' => $mdp);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        $unUser = $select->fetch();

        return $unUser;
    }
}