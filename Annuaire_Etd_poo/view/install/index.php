<?php
// session_start();
// if ($_SESSION['type_compte'] == 0){
//     header ('location: index.php');
//     exit;
// }
/**
 * Ouvrir une connexion via PDO pour créer un
 * nouvelle base de données avec une table structurée.
 *
 */
?>
<?php
    $host       = "localhost";
	$username   = "ad_annuaire";
	$password   = "pwannuaire";
	$dbname     = "dbannuaire";
	$tbl        = "employes_obj";
	$options    = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	  );


    

?>
<?php


try {
    //cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $ptions);
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    //$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass, $this->opt);
    $sql = file_get_contents("database.sql");
    $connection->exec($sql);
    echo "La base de données ont été créés avec succès.";
    echo "<br><br> <a href='../../' id='retour'>Retour</a>";

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}