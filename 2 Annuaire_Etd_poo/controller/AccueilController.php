<?php

class AccueilController
{
	public function index()
	{
		include "templates/header.php";
		die("
			<h3>Bienvenue </h3>
			<a href='?ctrl=employe'> Accéder à l'annuaire des employés</a>
			<br><br>
			<a href='?ctrl=install'> Installation de la base</a>
		");
		include "templates/footer.php"; 
	}
}


