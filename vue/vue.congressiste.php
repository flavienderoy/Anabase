
<div id=blocListe>
<h1>Inscription d'un congressiste à une activité</h1>
<br>
<h3>Choisir un congressiste</h3>
<form method="post" action="">
<table class="table table-hover">
<th>NOM</th>
<th>PRENOM</th>
<th>ADRESSE</th>
<th>SELECTION</th>
    <?php foreach($c->data["idC"] as $unCongressiste){
?>
<tr>
    <td><?php echo $unCongressiste->NOM_CONGRESSISTE;?></td>
    <td><?php echo $unCongressiste->PRENOM_CONGRESSISTE;?></td>
    <td><?php echo $unCongressiste->ADRESSE_CONGRESSISTE?></td>
    <td><input type="button" class="btn btn-primary" onclick="window.location.href = 'index.php?controleur=congressiste&idChoix=<?php echo $unCongressiste->NUM_CONGRESSISTE; ?>'" value="Choisir" /></td>

    </tr>

<?php } ?>
</table>
<br>
</form>
<?php
if(isset($_GET["idChoix"])){
    $nom = $c->data["nom"];
    ?>
    <h3><?php echo $nom->NOM_CONGRESSISTE," ", $nom->PRENOM_CONGRESSISTE;?> serra présent aux activité :</h3>
    <form method="post" action="">
    </table>
    

        <table class="table table-hover">
            <th>NOM</th>
            <th>DATE</th>
            <th>HEURE</th>
            <th>PRIX</th>
            <th>SELECTION</th>
            <?php foreach ($c->data["idA"] as $uneActivite) {
            ?>
                <tr>
                    <td><?php echo $uneActivite->NOM_ACTIVITE; ?></td>
                    <td><?php echo $uneActivite->DATE_ACTIVITE; ?></td>
                    <td><?php echo $uneActivite->HEURE_ACTIVITE ;?></td>
                    <td><?php echo $uneActivite->PRIX_ACTIVITE ;?>€</td>
                    <td><input type="checkbox" value="<?php echo $uneActivite->NUM_ACTIVITE; ?>" name="chkl[ ]"></td>
                </tr>
            <?php } ?>
            <br>
        </table>
        <?php
}
?>

<input type="submit" class="btn btn-primary" name="todo" value = "Enregistrer">
    </form>
</div>