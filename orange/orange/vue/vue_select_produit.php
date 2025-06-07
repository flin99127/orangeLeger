<h3>Liste des Produits</h3>

<form action="" method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td>Id Produit</td>
        <td>Désignation</td>
        <td>Prix d'achat</td>
        <td>Date achat</td>
        <td>Catégorie</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Opérations</td>
    </tr>
    <?php
    if(isset($lesProduits))
    {
        foreach($lesProduits as $unProduit)
        {
            echo "<tr>";
            echo "<td>". $unProduit['idproduit']. "</td>";
            echo "<td>". $unProduit['designation']. "</td>";
            echo "<td>". $unProduit['prixAchat']. "</td>";
            echo "<td>". $unProduit['dateAchat']. "</td>";
            echo "<td>". $unProduit['categorie']. "</td>";
            echo "<td>". $unProduit['nom']. "</td>";
            echo "<td>". $unProduit['prenom']. "</td>";
            echo "<td>";
            echo "<a href='index.php?page=3&action=edit&idproduit=".$unProduit['idproduit']."'><img src='image/editer.png' height='30' width='30'></a>";
            echo "<a href='index.php?page=3&action=sup&idproduit=".$unProduit['idproduit']."'><img src='image/supprimer.png' height='30' width='30'></a>";
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>