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
 * Utilisez un formulaire HTML pour créer une nouvelle entrée 
 * dans la table des utilisateurs.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
            "prenom"    => $_POST['prenom'],
            "nom"       => $_POST['nom'],
            "email"     => $_POST['email'],
            "age"       => $_POST['age'],
            "ville"     => $_POST['ville'],
            "genre"     => $_POST['genre'],
            "username"  => $_POST['username'],
            "mdp"       => $_POST['mdp'],
            "type"      => $_POST['type']
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "employes",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['prenom']; ?> a été ajouté avec succès.</blockquote>
<?php } ?>

<h2>Ajouter un employé</h2>

<form method="post" name="inscription">
    <label for="prenom">Prénom</label>
    <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" class="form-control" style="width:20%" required>
    <label for="nom">Nom</label>
    <input placeholder="Obligatoire" type="text" name="nom" id="nom" class="form-control" style="width:20%" required>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email" class="form-control" style="width:20%">
    <label for"genre">Genre</label>
    <select name="genre" id="genre">
        <option>M.</option>
        <option>Mme.</option>
        <option>Mlle.</option>
    </select>
    <label for="age">Age</label>
    <input type="text" name="age" id="age" class="form-control" style="width:20%">
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville" class="form-control" style="width:20%">
    
    <label for="username">Nom utilisateur</label>
    <input type="text" name="username" id="username" class="form-control" style="width:20%" required>
    <label for="mdp">Mot de passe</label>
    <input type="text" name="mdp" id="mdp" class="form-control" style="width:20%" required>

    
    <select name="type" id="type">
        <option value=0>Utilisateur</option>
        <option value=1>Admin</option>
        <?php if ($_SESSION['type']==2) : ?>
        <option value=2>Super Admin</option>
        <?php endif; ?>
    </select>
    <br><br>
    <div  class="form-group">
    <a href="index.php" role="button" class="btn btn-info" id="retour">Retour</a>
    <input type="submit" name="submit" value="Ajouter" class="btn btn-success" style="margin-left:6%">
    
    <br><br>
</form>

</div>
<?php require "templates/footer.php"; ?>
</div>