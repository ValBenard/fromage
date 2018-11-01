<?php

class AccueilController
{
	public function index()
	{
		session_start();
		if (empty($_SESSION)){
			$aff = "<a href='?ctrl=employe&mth=login'> Connexion</a>";
		}
		else {
			$aff = "<form action='?ctrl=employe&mth=logout' method='post'>
			<input type='submit' value='Déconnexion' name='logout'>
			</form>";
		}
		include "templates/header.php";
		die("
			<h3>Bienvenue </h3>
			<a href='?ctrl=employe'> Accéder à l'annuaire des employés</a>
			<br><br>
			<a href='view/install/index.php'> Installation de la base</a>
			<br><br>
			$aff
		");
		include "templates/footer.php"; 
	}
}




