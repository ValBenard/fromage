<?php session_start(); ?>
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
<h2>Modifier un employé</h2>
<a href="?ctrl=employe">Retour</a><br><br>
<form action="?ctrl=employe&mth=edit&id=<?php echo $employe['id']; ?>" method="post">
    <label for="prenom">Prénom</label>
    <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" value="<?php echo $employe['prenom']; ?>">
    <label for="nom">Nom</label>
    <input placeholder="Obligatoire" type="text" name="nom" id="nom" value="<?php echo $employe['nom']; ?>" required>
    <label for="genre">Genre</label>
    <SELECT name="genre" size="1">
    <OPTION>M.
    <OPTION>Md.
    <OPTION>Mdlle
    </SELECT>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email" value="<?php echo $employe['email']; ?>" >
    <label for="age">Age</label>
    <input type="text" name="age" id="age" value="<?php echo $employe['age']; ?>">
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville" value="<?php echo $employe['ville']; ?>">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" value="<?php echo $employe['pseudo']; ?>">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" value="<?php echo $employe['mdp']; ?>">
    <label for="type de compte">Type de compte (actuellement 
    <?php if ($employe['type_compte'] == 0) : ?>
        <?php echo "Basique)"; ?>
    <?php endif; ?>
    <?php if ($employe['type_compte'] == 1) : ?>
        <?php echo "Admin)"; ?>
    <?php endif; ?>
    <?php if ($employe['type_compte'] == 2) : ?>
        <?php echo "Super Admin)"; ?>
    <?php endif; ?>
    </label>
    <SELECT name="type_compte" size="1">
    <OPTION value="0">Basique</option>
    <OPTION value="1">Admin</option>
    <OPTION value="2">Super-Admin</option>
    </SELECT>
    <label for="categorie">Catégorie</label>
    <SELECT name="categorie" size="1" required>
    <?php
    foreach ($data['categorie'] as $k => $v): ?>
        <?php $var=$v['categorie']; ?>
        <option value='<?php echo $var ?>'><?php echo $var; /*var_dump($v['categorie']);*/ ?></option>
        
    <?php endforeach;?>
</SELECT>
    
    <br><br>
    <div  class="form-group">
    <input type="submit" name="submit" value="Modifier">
    <br><br>
</form>

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