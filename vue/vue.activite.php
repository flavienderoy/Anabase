
<div id="blocListe">

<h1>Liste des activités
<input type="button" class="btn btn-primary" id="btnAjout" value="Ajouter une activité" onclick="window.location.href = '#popup'"/>
</h1> 



	<div class="liste" style="padding-top:10px;">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="header">NUMERO</th>
					<th class="header">NOM</th>
					<th class="header">DATE</th>
					<th class="header">HEURE</th>
					<th class="header">PRIX</th>
					<th class="header">MODIFIER</th>
					<th class="header">SUPPRIMER</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($c->data["get"] as $ligne) { ?>
					<tr>
						<td><?= $ligne->NUM_ACTIVITE; ?></td>
						<td><?= $ligne->NOM_ACTIVITE; ?></td>
						<td><?= $ligne->DATE_ACTIVITE; ?></td>
						<td><?= $ligne->HEURE_ACTIVITE; ?></td>
						<td><?= $ligne->PRIX_ACTIVITE ;?>€</td>
						<td><input type="button" class="btn btn-primary" onclick="window.location.href = 'index.php?controleur=activite&idModif=<?php echo $ligne->NUM_ACTIVITE; ?>'" id="btnModif" value= "Modifier" /></td>
						<td><input type="button" class="btn btn-danger" onclick="window.location.href = 'index.php?controleur=activite&idSuppr=<?php echo $ligne->NUM_ACTIVITE; ?>'" value= "Supprimer" /></td>
					</tr>
				<?php
				}
				if(isset($_GET["idModif"])){
					$recup = $c->data["getby"];
					?>
					<form method="post" action="">
					<td><?= $recup->NUM_ACTIVITE; ?></td>
					<td><input type="text" class="text" name="nomAM" value="<?php echo $recup->NOM_ACTIVITE; ?>" required></td>
					<td><input type="date" class="text" name="dateAM" value="<?php echo $recup->DATE_ACTIVITE; ?>" required></td>
					<td><input type="time" class="text" name="heureAM" value="<?php echo $recup->HEURE_ACTIVITE; ?>" required></td>
					<td><input type="number" min="1" class="text" name="prixAM" value="<?php echo $recup->PRIX_ACTIVITE; ?>" required></td>
					<td><button type="submit" class="btn btn-primary" name="todo" value="Modifier">Valider</button></td>
					<td><a href="index.php?controleur=activite" class="btn btn-danger">Annuler</td>
				  </form>
				  <?php
				}
				?>
			</tbody>
		</table>
		<?php
		if ($c->message != "") { ?>
			<div class="alert success">
				<?= $c->message ?>.
			</div>
		<?php } ?>
		<?php
		if ($c->erreur != "") { ?>
			<div class="alert warning">
				<?= $c->erreur ?>
			</div>
		<?php } ?>
	</div>
</div>
<div id="popup" class="overlay">
	<div class="popup">
	<div class="form">

		<form class="form_content" action="./?controleur=activite" method="POST">
			

		<h2>Création d'une activité :</h2>
		<br>


		<div class="form-floating">
			<input type="text" name="nomA" class="form-control" id="floatingInputGroup1" placeholder="Saisir un nom" required>
    <label for="floatingInputGroup1">Saisir un nom</label>
		</div>
			<br>
			
			<div class="form-floating">
			<input type="date" name="dateA" class="form-control" id="floatingInputGroup1"  value="" required/><br />
			<label for="floatingInputGroup1">Date :</label>
			</div>



			<div class="form-floating">
			<input type="time" name="heureA" class="form-control" id="floatingInputGroup1" value="" required/><br />
			<label for="floatingInputGroup1">Heure :</label>
			</div>



			<div class="form-floating">
			<input type="number" min="1" name="prixA" class="form-control" id="floatingInputGroup1" placeholder="Saisir un prix" value="" required/><br />
			<label for="floatingInputGroup1">Saisir un prix</label>
			</div>



			<br>
			<input type="button" class="btn btn-primary" name="todo" onclick="window.location.href = '#'" value="Annuler" />
			<input type="submit" class="btn btn-primary" name="todo" value="Enregistrer" />
			<span id="msg" style="color:red"></span>
			<?php
			if ($c->message != "") { ?>
				<div class="alert success">
					<?= $c->message ?>.
				</div>
			<?php } ?>
		</form>
	</div>
			</div>
</div>