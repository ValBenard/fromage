<?php include "templates/header.php";?>

<h2>Modifier un employé</h2>
    
    <form action="?ctrl=employe&mth=edit&id=<?php echo $employe['id']?>" method="post">
        <label for="prenom">Prénom</label>
        <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" value="<?php echo $employe['prenom']?>" required>
        <label for="nom">Nom</label>
        <input placeholder="Obligatoire" type="text" name="nom" id="nom" value="<?php echo $employe['nom']?>" required>
        <label for="genre">Genre</label>
        <SELECT name="genre" size="1" id="genre">
        <OPTION>M.
        <OPTION>Mme.
        <OPTION>Mlle
        </SELECT>
        <label for="email">Adresse mail</label>
        <input type="text" name="email" id="email" value="<?php echo $employe['email']?>">
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="<?php echo $employe['age']?>">
        <label for="ville">ville de résidence</label>
        <input type="text" name="ville" id="ville" value="<?php echo $employe['ville']?>">
        <label for="username">Pseudo</label>
        <input type="text" name="username" id="username" value="<?php echo $employe['username']?>">
        <label for="mdp">Password</label>
        <input type="text" name="mdp" id="mdp" value="<?php echo $employe['mdp']?>">
        <!-- <label for="type de compte">Type de compte (actuellement 
        <?php /* if ($type == 0) : ?>
            <?php echo "Basique)"; ?>
        <?php endif; ?>
        <?php if ($type == 1) : ?>
            <?php echo "Admin)"; ?>
        <?php endif; ?>
        <?php if ($type == 2) : ?>
            <?php echo "Super Admin)"; ?>
        <?php endif; */?>
        </label>
        <SELECT name="type_compte" size="1">
        <OPTION value="0">Basique</option>
        <OPTION value="1">Admin</option>
        <OPTION value="2">Super-Admin</option>
        </SELECT> -->
        
        <br><br>
        <div  class="form-group">
        <a href="?ctrl=employe">Retour</a><br><br>
        <input type="submit" name="submit" value="Modifier">
        <br><br>
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