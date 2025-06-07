<h2>Gestion des produits</h2>

<?php

$lesClients = $unControleur->selectAllClient();

if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
{
    $leProduit = null;
    
    if(isset($_GET['action']) && isset($_GET['idproduit']))
    {
        $idproduit = $_GET['idproduit'];
        $action = $_GET['action'];
        
        switch($action)
        {
            case "sup":
                $unControleur->deleteProduit($idproduit);
                echo "<script>alert(\"produit supprimer ". $idproduit ."\")</script>";
            break;
            case "edit":
                $leProduit = $unControleur->selectWhereProduit($idproduit);
            break;
        }
    }

    // pas toucher

    require_once("vue/vue_insert_produit.php");

    if(isset($_POST['Valider']))
    {
        $unControleur->insertProduit($_POST);
    }
    if(isset($_POST['Modifier']))
    {
        $unControleur->updateProduit($_POST);
        header("Location: index.php?page=3");
    }
}

$lesProduits = $unControleur->selectAllProduit();

$nb = $unControleur->count("produit")['nb'];
echo "<br> Nombre de produits : ".$nb;

require_once("vue/vue_select_produit.php");

?>