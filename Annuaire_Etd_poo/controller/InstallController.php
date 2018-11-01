<?php

require_once 'model/install.php';

class InstallController {

	private $installs;

	public function __construct() {
		$this->installs = new install();
    }
    
    public function install() {

        echo "La base de données ont été créés avec succès.";
        echo "<br><br> <a href='?ctrl=Accueil&mth=index' role='button' class='btn btn-info' id='retour'>Retour</a>";
        include "view/install/index.php";
    }

}