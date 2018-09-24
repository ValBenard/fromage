<?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
?>
<?php

/**
 * Fonction pour interroger les informations en fonction du
 * paramètre: ville
 *
 */

// if (isset($_POST['submit'])) {
    try  {
        
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
                FROM employes";

        
        $statement = $connection->prepare($sql);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
// }
?>
<?php require "templates/header.php"; ?>
        
<?php  
// if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Liste des employés</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse mail</th>
                    <th>Genre</th>
                    <th>Age</th>
                    <th>ville</th>
                    <th>Date</th>
                    <th></th>
                    <?php if ($_SESSION['type']==2) : ?>
                    <th><form action="" method="POST">
                    <input type="submit" name="supp" value="Supprimer" class="btn btn-danger">
                    </th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["prenom"]); ?></td>
                <td><?php echo escape($row["nom"]); ?></td>
                <td><?php echo escape($row["email"]); ?></td>
                <td><?php echo escape($row["genre"]);?></td>
                <td><?php echo escape($row["age"]); ?></td>
                <td><?php echo escape($row["ville"]); ?></td>
                <td><?php echo escape($row["date"]); ?> </td>
                <?php if (($_SESSION['type']==2) || ($_SESSION['type']==1)) : ?>
                    <td><a class="text-secondary" href="update.php?update=<?= $row['id']; ?>" >Modifier</a></td>
                <?php endif; ?>
                <?php if ($_SESSION['type']==2) : ?>
                <td><a class="text-danger" href="delete.php?delete=<?= $row['id']; ?>" >Supprimer</a></td>
                
                <td>
                        <input type="checkbox" name="choix[]" class="checkbox" value="<?php echo $row['id'];?>"/>
                    
                </td>
                <?php endif; ?>
            </tr>

            
        <?php }?>
            </tbody>
        </table>
        </form>

        <?php
        if (isset($_POST['supp'])){
            if (isset($_POST['choix'])){
                $box = $_POST['choix'];

            
                $check = count($box);
                // echo "check = ".$check;
                for ($i=0; $i<$check; $i++){
                    $id = $row['id'];
                    $key = $box[$i];
                    $req = ("DELETE FROM dbannuaire.employes WHERE id='$key'");
                    $connection->query($req);
                    // echo $req;
                    // echo "key = $key";
                }
            }
            header('location: lire.php');
        }
        ?>
        
    <?php } else { ?>
        <blockquote>Aucun résultat trouvé<?php /*if(isset($_POST['ville'])) {echo escape($_POST['ville']);} else{echo "la ville";} */?>.</blockquote>
    <?php } 
    // }?> 

<!-- <h2>Liste des employés</h2>

<form method="post">
    <label for="ville">ville</label>
    <input type="text" id="ville" name="ville">
    <input type="submit" name="submit" value="Voir les résultats">
</form> -->

<a href="index.php" role="button" class="btn btn-info" style="margin-left:1%">Retour</a>

<?php require "templates/footer.php"; ?>
