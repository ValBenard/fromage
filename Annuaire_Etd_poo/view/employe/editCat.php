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

<h2>Modifier une catégorie</h2>
<a href="?ctrl=employe">Retour</a><br><br>
<form action="?ctrl=employe&mth=editCat&id=<?php echo $categorie['id_cat']; ?>" method="post">
    <label for="categorie">Catégorie</label>
    <input placeholder="Obligatoire" type="text" name="categorie" id="categorie" value="<?php echo $categorie['categorie']; ?>">
    
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