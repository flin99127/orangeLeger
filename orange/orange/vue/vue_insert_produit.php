<h3>Ajout d'un produit</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Désignation</td>
            <td><input type="text" name="designation" value="<?= ($leProduit != null) ? $leProduit['designation'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Prix Achat</td>
            <td><input type="text" name="prixAchat" value="<?= ($leProduit != null) ? $leProduit['prixAchat'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Date Achat</td>
            <td><input type="date" name="dateAchat" value="<?= ($leProduit != null) ? $leProduit['dateAchat'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Catégories</td>
            <td>
                <select name="categorie">
                    <option value="Téléphone" <?= ($leProduit != null && $leProduit['categorie'] == 'Téléphone') ? 'selected' : '' ?> > Téléphone</option>
                    <option value="Informatique" <?= ($leProduit != null && $leProduit['categorie'] == 'Informatique') ? 'selected' : '' ?> > Informatique</option>
                    <option value="Télévision" <?= ($leProduit != null && $leProduit['categorie'] == 'Télévision') ? 'selected' : '' ?> > Télévision</option>
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
                        $selected_client = $unClient['idclient'] == $leProduit['idclient'] ? "selected" : "";
                        
                        echo "<option value='". $unClient['idclient']."'" .$selected_client.">";
                        echo "". $unClient["nom"]. " " .$unClient["prenom"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <input type="submit" <?= ($leProduit!=null) ?' name="Modifier" value="Modifier" ' : ' 
                name="Valider" value="Valider" ' ?>>
                <input type="reset" name="Annuler" onclick="annulerModification()" value="Annuler">
            </td>
        </tr>
        <?= ($leProduit!=null) ? '<input type="hidden" name="idproduit" value="'.$leProduit['idproduit'].'"> ': ''?>
    </table>
    <script>
        function annulerModification() 
        {
            window.location.href="index.php?page=3"
        }
    </script>
</form>


