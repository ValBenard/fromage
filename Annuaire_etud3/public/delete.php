<?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
if (($_SESSION['type']==0) || $_SESSION['type']==1){
    header ('location:index.php');
}
?>

<?php

/**
 * Ouvrir une connexion via PDO pour créer un
 * nouvelle base de données avec une table structurée.
 *
 */

$host       = "localhost";
$username   = "ad_annuaire";
$password   = "pwannuaire";
$dbname     = "dbannuaire";
$dsn        = "mysql:host=$host;dbname=$dbname";
$tbl        = "employes";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);


} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

$connection->query("DELETE FROM dbannuaire.employes WHERE id='$id'");
}
// $result = $_GET['choix'];

// foreach($result as $id)
// {
// $connection->query("DELETE FROM dbannuaire.employes WHERE id='$id'");
// }

if (isset($_POST['supp'])){
    $check = count($_POST['choix']);
    echo $check;
    $req = ("DELETE FROM dbannuaire.employes WHERE id IN ('.$id.')");
    $connection->query($req);
    echo $req;
}



// for ($i=0;$i<count($_POST['choix']);$i++){
//     $choix = $_POST['choix'][$i];
//     $connection->query("DELETE FROM dbannuaire.employes WHERE id='$choix[$i]'");
//     echo "test";
     //ici votre requête DELETE ou la variable $choix correspond à l'id de la checkbox }
// }


header('location: lire.php');

