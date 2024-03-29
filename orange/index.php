<?php

session_start();
require_once("controleur/controleur.class.php");

$unControleur = new Controleur();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orange</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <center>

        <?php
        if(!isset($_SESSION["email"]))
        {
            require_once("vue/vue_connexion.php");
        }

        if(isset($_POST["seConnecter"]))
        {
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];
            $unUser = $unControleur->verifConnexion($email, $mdp);
            
            if($unUser != null)
            {
                $_SESSION["nom"] = $unUser["nom"];
                $_SESSION["prenom"] = $unUser["prenom"];
                $_SESSION["email"] = $unUser["email"];
                $_SESSION["role"] = $unUser["role"];

                header("Location: index.php?page=1");
            }
        }
        if(isset($_SESSION["email"]))
        {
            echo '

            <h1>Site intervention Orange</h1>
            <a href="index.php?page=1">
                <img src="image/home.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=2">
                <img src="image/client.jpeg" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=3">
                <img src="image/produit.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=4">
                <img src="image/technicien.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=5">
                <img src="image/intervention.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=6">
                <img src="image/deconnexion.png" alt="" height="100" width="100">
            </a>';
            
            if(isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
            else
            {
                $page = 1;
            }
            switch($page)
            {
                case 1:
                    require_once("home.php");
                break;
                case 2:
                    require_once("gestion_client.php");
                break;
                case 3:
                    require_once("gestion_produit.php");
                break;
                case 4:
                    require_once("gestion_technicien.php");
                break;
                case 5:
                    require_once("gestion_intervention.php");
                break;
                case 6 : session_destroy();
                    unset($_SESSION['email']);
                    
                    header("Location: index.php");
                break;
            }
        }
        ?>

    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>