<h3>Ajout d'un technicien</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Nom du technicien</td>
            <td><input type="text" name="nom" value="<?= ($leTechnicien!=null) ? $leTechnicien['nom']  : '' ?>"></td>
        </tr>
        <tr>
            <td>Prénom du technicien</td>
            <td><input type="text" name="prenom" value="<?= ($leTechnicien!=null) ? $leTechnicien['prenom']  : '' ?>"></td>
        </tr>
        <tr>
            <td>Spécialité</td>
            <td><input type="text" name="specialite" value="<?= ($leTechnicien!=null) ? $leTechnicien['specialite']  : '' ?>"></td>
        </tr>
        <tr>
            <td>Date embauche</td>
            <td><input type="date" name="dateEmbauche" value="<?= ($leTechnicien!=null) ? $leTechnicien['dateEmbauche'] : '' ?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <input type="submit" <?= ($leTechnicien!=null) ?' name="Modifier" value="Modifier" ' : ' 
                name="Valider" value="Valider" ' ?>>
                <input type="reset" name="Annuler" onclick="annulerModification()" value="Annuler">
            </td>
        </tr>
        <?= ($leTechnicien!=null) ? '<input type="hidden" name="idtechnicien" value="'.$leTechnicien['idtechnicien'].'"> ': ''?>
    </table>
    <script>
        function annulerModification() 
        {
            window.location.href="index.php?page=4"
        }
    </script>
</form>