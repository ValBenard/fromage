<?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
if ($_SESSION['type']==0){
    header ('location:index.php');
}
?>


<div class="container">
<?php

/**
 * Ouvrir une connexion via PDO pour créer un
 * nouvelle base de données avec une table structurée.
 *
 */



try {

    require "../config.php";
    require "../common.php";
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
   
    

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_GET['update'])){

    $id = $_GET['update'];

    $sql = "SELECT * 
    FROM dbannuaire.employes WHERE id=$id";


    $statement = $connection->prepare($sql);
    $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();

    $sql = "SELECT * FROM dbannuaire.employes WHERE id = $id";
    $connection->query($sql);

    foreach ($result as $row) {
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $email = $row["email"];
        $age = $row["age"];
        $ville = $row["ville"];
        $genre = $row['genre'];
        $username = $row['username'];
        $mdp = $row['mdp'];
        $type = $row['type'];
    } ?>
    
    <h2>Modifier un employé</h2>
    
    <form method="post">
        <label for="prenom">Prénom</label>
        <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" class="form-control" style="width:20%" value=<?php echo "$prenom" ?> required>
        <label for="nom">Nom</label>
        <input placeholder="Obligatoire" type="text" name="nom" id="nom" class="form-control" style="width:20%" value=<?php echo "$nom" ?> required>
        <label for="email">Adresse mail</label>
        <input type="text" name="email" id="email" class="form-control" style="width:20%" value=<?php echo "$email" ?>>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" class="form-control" style="width:20%" value=<?php echo "$age" ?>>
        <label for="ville">ville de résidence</label>
        <input type="text" name="ville" id="ville" class="form-control" style="width:20%" value=<?php echo "$ville" ?>>

        <label for="username">Nom utilisateur</label>
        <input type="text" name="username" id="username" class="form-control" style="width:20%" value=<?php echo "$username" ?> required>
        <label for="mdp">Mot de passe</label>
        <input type="text" name="mdp" id="mdp" class="form-control" style="width:20%" value=<?php echo "$mdp" ?> required>
        <br><br>
        <div  class="form-group">
        <a href="lire.php" role="button" class="btn btn-info" id="retour">Retour</a>
        <input type="submit" name="submit" value="Modifier" class="btn btn-success" style="margin-left:5%">
        <br><br>
    </form>
</div>

    

<?php

} ?>

<?php 
if (isset($_POST['submit'])){
    
    $new_user = array(
        "prenom"    => $_POST['prenom'],
        "nom"       => $_POST['nom'],
        "email"     => $_POST['email'],
        "age"       => $_POST['age'],
        "ville"     => $_POST['ville']
    );

    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $ville = $_POST["ville"];

    $sql = "UPDATE dbannuaire.employes set prenom='$prenom', nom='$nom', email='$email', age='$age', ville='$ville' WHERE id='$id'";
    $connection->query($sql);

    header('location: lire.php');
}

?>

<?php require "templates/footer.php"; ?>
</div>