<?php include "templates/header.php";?>

<h2>Adjouter un employé</h2>
<a href="?ctrl=employe">Retour</a><br><br>
<form action="?ctrl=employe&mth=add" method="post">
    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom"><br>
    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom"><br>
    <label for="email">Adresse mail</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="age">Age</label><br>
    <input type="text" name="age" id="age"><br>
    <label for="ville">ville de résidence</label><br>
    <input type="text" name="ville" id="ville">
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
    <br><br>

	<?php if ($errors) {
			?>
			<h3>Erreur:</h3>
			<ul>
				<?php foreach ($errors as $value) { ?>
					<li><?php echo $value; ?></li>
				<?php } ?>
			</ul>
	<?php } ?>
</form>

<?php include "templates/footer.php";?>