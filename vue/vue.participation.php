<script src="https://kit.fontawesome.com/9d1c0df208.js" crossorigin="anonymous"></script>


<div id=blocListe>

<h1>Participation aux activités


<input type="button" class="btn btn-primary" id="btnAjout" value="Vous inscrire" onclick="window.location.href = 'index.php?controleur=congressiste'"/>

</h1>


<br><br>

<table class="table table-hover">
<th>NOM</th>
<th>PRENOM</th>
<th>PARTICIPE A</th>
<th>JOUR</th>
<th>HEURE</th>
<th>ANNULER</th>
    <?php foreach($c->data["All"] as $a){
?>
<tr>
    <td><?php echo $a->NOM_CONGRESSISTE;?></td>
    <td><?php echo $a->PRENOM_CONGRESSISTE;?></td>
    <td><?php echo $a->NOM_ACTIVITE; ?></td>
    <td><?php echo $a->DATE_ACTIVITE; ?></td>
    <td><?php echo $a->HEURE_ACTIVITE; ?></td>
    <td><a href="index.php?controleur=participation&idSupprC=<?php echo $a->NUM_CONGRESSISTE;?>&idSupprA=<?php echo $a->NUM_ACTIVITE;?>" class="btn btn-danger">Annulation</td>

    </tr>

<?php } ?>
</table>
    </div>