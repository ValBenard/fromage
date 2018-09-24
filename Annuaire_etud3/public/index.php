<?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
?>


<div class="container">
	<?php include "templates/header.php"; ?>

	<div class="list-group">
		<ul>
			<?php if ($_SESSION['type']==2) : ?>
				<a class="list-group-item list-group-item-action list-group-item-primary" href="../install.php"><strong> - Installer la base de données</strong></a></li>
			<?php endif; ?>
			<?php if (($_SESSION['type']==2) || ($_SESSION['type']==1)) : ?>
				<a class="list-group-item list-group-item-action list-group-item-light" href="create.php"><strong> - Ajouter un employé</strong></a></li>
			<?php endif; ?>
			<a class="list-group-item list-group-item-action list-group-item-primary" href="lire.php"><strong> - Afficher les employés</strong></a></li>
		</ul>
	</div>
</div>
<form action="" method="post">
    <input type="submit" value="Déconnexion" name="logout">
</form>
<?php 
	if ($_SESSION['type']==1) {
		echo "Admin";
	} 
	elseif ($_SESSION['type']==2) {
		echo "SuperAdmin";
	}
	else {
		echo "Utilisateur";
	}

?>


<?php
if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header ('location: index.php');
}
?>

<?php include "templates/footer.php"; ?>