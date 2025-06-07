<h3>Liste des interventions</h3>

<form action="" method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td>Id intervention</td>
        <td>Description</td>
        <td>Prix intervention</td>
        <td>Date intervention</td>
        <td>Désignation</td>
        <td>Nom</td>
        <td>Préom</td>
        <td>Opérations</td>
    </tr>
    <?php
    if(isset($lesInterventions))
    {
        foreach($lesInterventions as $unIntervention)
        {
            echo "<tr>";
            echo "<td>". $unIntervention['idinter']. "</td>";
            echo "<td>". $unIntervention['description']. "</td>";
            echo "<td>". $unIntervention['prixinter']. "</td>";
            echo "<td>". $unIntervention['dateinter']. "</td>";
            echo "<td>". $unIntervention['designation']. "</td>";
            echo "<td>". $unIntervention['nom']. "</td>";
            echo "<td>". $unIntervention['prenom']. "</td>";
            echo "<td>";
            echo "<a href='index.php?page=5&action=edit&idinter=".$unIntervention['idinter']."'><img src='image/editer.png' height='30' width='30'></a>";
            echo "<a href='index.php?page=5&action=sup&idinter=".$unIntervention['idinter']."'><img src='image/supprimer.png' height='30' width='30'></a>";
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>