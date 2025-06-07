<h3>Ajout d'un intervention</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Desciption</td>
            <td><textarea name="description" id="" cols="40" rows="4"><?= ($leInter!=null) ? $leInter['description'] : '' ?></textarea></td>
        </tr>
        <tr>
            <td>Prix intervention</td>
            <td><input type="number" name="prixInter" value="<?= ($leInter!=null) ? $leInter['prixInter'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Date intervention</td>
            <td><input type="date" name="dateInter" value="<?= ($leInter!=null) ? $leInter['dateInter'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Le produit</td>
            <td>
                <select name="idproduit" id="">
                    <?php
                    foreach($lesProduits as $unProduit) 
                    {
                        $selected_designation = $unProduit["designation"] == $leInter["designation"] ? "selected" : "";

                        echo "<option value='". $unProduit['idproduit']."'".$selected_designation.">";
                        echo "". $unProduit["designation"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Le technicien</td>
            <td>
                <select name="idtechnicien" id="">
                    <?php
                    foreach($lesTechniciens as $unTechnicien)
                    {
                        $selected_tech = $unTechnicien['idtechnicien'] == $leInter['idtechnicien'] ? "selected" : "";

                        echo "<option value='". $unTechnicien['idtechnicien']."'" .$selected_tech.">";
                        echo"". $unTechnicien["nom"]. " ". $unTechnicien["prenom"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <input type="submit" <?= ($leInter!=null) ?' name="Modifier" value="Modifier" ' : ' 
                name="Valider" value="Valider" ' ?>>
                <input type="reset" name="Annuler" onclick="annulerModification()" value="Annuler">
            </td>
        </tr>
        <?= ($leInter!=null) ? '<input type="hidden" name="idinter" value="'.$leInter['idinter'].'"> ': ''?>
    </table>
    <script>
        function annulerModification() 
        {
            window.location.href="index.php?page=5"
        }
    </script>
</form>