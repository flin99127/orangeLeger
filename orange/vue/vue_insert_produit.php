<h3>Ajout d'un produit</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Désignation</td>
            <td><input type="text" name="designation"></td>
        </tr>
        <tr>
            <td>Prix Achat</td>
            <td><input type="text" name="prixAchat"></td>
        </tr>
        <tr>
            <td>Date Achat</td>
            <td><input type="date" name="dateAchat"></td>
        </tr>
        <tr>
            <td>Catégories</td>
            <td>
                <select name="categorie" id="">
                    <option value="telephone">Téléphone</option>
                    <option value="informatique">Informatique</option>
                    <option value="television">Télévision</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Le client</td>
            <td>
                <select name="idclient" id="">
                    <?php
                    foreach($lesClients as $unClient) 
                    {
                        echo "<option value='". $unClient['idclient']."'>";
                        echo $unClient["nom"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <input type="reset" name="Annuler" value="Annuler">
                <input type="submit" name="Valider" value="Valider">
            </td>
        </tr>
    </table>
</form>