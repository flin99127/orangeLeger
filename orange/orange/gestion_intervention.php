<h2>Gestion des interventions</h2>

<?php

$lesTechniciens = $unControleur->selectAllTechnicien();
$lesProduits = $unControleur->selectAllProduit();


if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
{
    $leInter = null;
    
    if(isset($_GET['action']) && isset($_GET['idinter']))
    {
        $idinter = $_GET['idinter'];
        $action = $_GET['action'];
        
        switch($action)
        {
            case "sup":
                $unControleur->deleteInter($idinter);
                echo "<script>alert(\"inter supprimer ". $idinter ."\")</script>";
            break;
            case "edit":
                $leInter = $unControleur->selectWhereInter($idinter);
            break;
        }
    }


        //pas touche
        require_once("vue/vue_insert_intervention.php");

        if(isset($_POST["Valider"]))
        {
            $unControleur->insertIntervention($_POST);
        }
        if(isset($_POST['Modifier'])) 
        {
            $unControleur->updateInter($_POST);
            header("Location: index.php?page=5");
        }
}

$lesInterventions = $unControleur->selectAllIntervention();

$nb = $unControleur->count("intervention")['nb'];
echo "<br> Nombre d'interventions : ".$nb;

require_once("vue/vue_select_intervention.php");

?>