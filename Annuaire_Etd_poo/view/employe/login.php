<?php session_start(); ?>
<?php include "templates/header.php";?>

<?php 
if (!empty($_SESSION)){
    echo "<script type='text/javascript'>alert('Vous êtes déjà connecté'); 
	window.location.href='?ctrl=Accueil&mth=index';</script>";
    //header("Location: ?ctrl=Accueil&mth=index");
    exit();
    
}
?>

<h2>Login</h2>
<a href="?ctrl=Accueil&mth=index">Retour</a><br><br>
<form action="?ctrl=employe&mth=login" method="post">
    <label for="POST-username">Nom d'utilisateur : </label>
    <input type="text" name="pseudo" class="form-control" style="width:20%" required>
    <br>
    <label for="POST-password">Mot de passe : </label>
    <input type="password" name="password" class="form-control" style="width:20%" required>
    <br>
    <input type="submit" value="Connexion" name="login" class="btn btn-success">
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