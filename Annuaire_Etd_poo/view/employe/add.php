<?php session_start();?>
<?php include "templates/header.php";?>
<?php $type = $_SESSION['type_compte']; ?>

<?php if (empty($_SESSION)){
	echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette page'); 
	window.location.href='?ctrl=employe&mth=login';</script>";
	//echo "<script type='text/javascript'> alert('test'); </script>";
	//header("Location: ?ctrl=Accueil&mth=index");
    //exit();
    
}

else if ($type == 0){
    echo "<script type='text/javascript'>alert('Vous devez être administrateur pour accéder à cette page'); 
	window.location.href='?ctrl=employe';</script>";
}
?>

<h2>Adjouter un employé</h2>
<a href="?ctrl=employe">Retour</a><br><br>
<form action="?ctrl=employe&mth=add" method="post">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom"><br><br>
    <SELECT name="genre" size="1">
    <OPTION>M.
    <OPTION>Mme.
    <OPTION>Mlle.
    </SELECT><Br>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom"><br>
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" ><br>
    <label for="password">Password</label>
    <input type="text" name="password" id="password"><br>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email"><br>
    <label for="age">Age</label>
    <input type="text" name="age" id="age"><br>
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville"><br>
    <label for="type de compte">Type de compte</label>
    <SELECT name="type_compte" size="1" required>
    <OPTION value="0">Basique</option>
    <OPTION value="1">Admin</option>
    <OPTION value="2">Super-Admin</option>
    </SELECT><br>
    <label for="categorie">Catégorie</label>
    <SELECT name="categorie" size="1" required><br>
    <?php
    foreach ($data['categorie'] as $k => $v): ?>
        <?php $var=$v['categorie']; ?>
        <option value='<?php echo $var ?>'><?php echo $var; /*var_dump($v['categorie']);*/ ?></option>
        
    <?php endforeach;?>
    </SELECT>
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
    <br><br>

	<?php if ($errors) : ?>
			<h3>Erreur:</h3>
			<ul>
				<?php foreach ($errors as $value) : ?>
					<li><?php echo $value; ?></li>
                <?php endforeach; ?>
			</ul>
    <?php endif; ?>
</form>

<?php include "templates/footer.php";?>