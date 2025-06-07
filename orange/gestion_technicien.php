<h2>Gestion des techniciens</h2>

<?php

if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
{
    $leTechnicien = null;
    
    if(isset($_GET['action']) && isset($_GET['idtechnicien']))
    {
        $idtechnicien = $_GET['idtechnicien'];
        $action = $_GET['action'];
        
        switch($action)
        {
            case "sup":
                $unControleur->deleteTechnicien($idtechnicien);
                echo "<script>alert(\"technicien supprimer ". $idtechnicien ."\")</script>";
            break;
            case "edit":
                $leTechnicien = $unControleur->selectWhereTechnicien($idtechnicien);
            break;
            /*case "voir":
                $lesTechniciens = $unControleur->selectProdInterTech($idtechnicien);
            break;*/
            case "prime":
                $lesTechnicien = $unControleur->primeTechnicien($idtechnicien);
            break;
        }
    }

        require_once("vue/vue_insert_technicien.php");

        if (isset($_POST["Valider"]))
        {
            $unControleur->insertTechnicien($_POST);
        }
        if(isset($_POST["Modifier"]))
        {
                $unControleur->updateTechinicien($_POST);
                header("Location: index.php?page=4");
        }
}

if(isset($_POST['Filtrer']))
{
    $filtre = $_POST['filtre'];
    $lesTechniciens = $unControleur->selectLikeTechnicien($filtre);
}
else
{
    $lesTechniciens = $unControleur->selectAllTechnicien();
}


$nb = $unControleur->count("technicien")['nb'];
echo "<br> Nombre de techniciens : ".$nb;

require_once("vue/vue_select_technicien.php");

if(isset($lesProduits))
{
    require_once("vue/vue_select_produit.php");
}
if(isset($lesInterventions))
{
    require_once("vue/vue_select_intervention.php");
}

?>


