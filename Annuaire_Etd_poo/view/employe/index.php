<?php session_start(); ?>
<?php include "templates/header.php";?>
<?php $type = $_SESSION['type_compte'];?>

<?php

if (empty($_SESSION)){
	echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette page'); 
	window.location.href='?ctrl=employe&mth=login';</script>";
	//echo "<script type='text/javascript'> alert('test'); </script>";
	//header("Location: ?ctrl=Accueil&mth=index");
    //exit();
    
}
?>


<p>
	<?php if ($type != 0){
		echo "<p><a href='?ctrl=employe&mth=add'>Ajouter un employé</a> |
		<a href='?ctrl=employe&mth=categorie'>Modifier Catégorie</a></p>";
	}
	?>
	
</p>
<?php
if (!empty($data['notification'])) {
	echo "<p>$data[notification]</p>";
}
?>
<table>
	<thead>
		<tr>
			<th>Ligne</th>
			<th>Id</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Age</th>	
			<th>Ville</th>
			<th>Type</th>
			<th>Catégorie</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($data['employes']) : ?>
			<?php foreach ($data['employes'] as $k => $v) : ?>
				<tr>
					<td><?php echo $k+1; ?></td>
					<td><a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>"><?php echo $v['id']; ?></a></td>
					<td><a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>"><?php echo $v['prenom']; ?></a></td>
					<td><a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>"><?php echo $v['nom']; ?></a></td>
					<td><a href="mailto:<?php echo $v['email']; ?>"><?php echo $v['email']; ?></a></td>
					<td><a href="tel:<?php echo $v['age']; ?>"><?php echo $v['age']; ?></a></td>
					<td><a href="https://www.google.com/maps?q=<?php echo $v['ville']; ?>"><?php echo $v['ville']; ?></a></td>
					<td><?php 
							if ($v['type_compte']==2) {echo "Super Admin";}
							else if ($v['type_compte']==1) {echo "Admin";}
							else {echo "Basique";							}
						?></td>
					<td>
					<a href="?ctrl=employe&mth=trie2&cat=<?php echo $v['categorie']; ?>"><?php echo $v['categorie']; ?></a>
					</td>					
					<td>
						<?php if ($_SESSION['type_compte'] != 0) : ?>
						<a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>">Lire |</a>
							<a href="?ctrl=employe&mth=edit&id=<?php echo $v['id']; ?>">Modifier |</a>
							<a href="?ctrl=employe&mth=delete&id=<?php echo $v['id']; ?>">Supprimer</a>
						<?php else : ?>
							<a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>">Lire</a>
						<?php endif; ?>
						
						
					</td>
				</tr>
			<?php
			endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="6">Pas d\'employé</td>
			</tr>
		<?php
		endif;
		?>
	</tbody>
</table>
<!--<br>
	<form action="?ctrl=employe&mth=trie" method="post">
		<SELECT name="categorie" required>
			<?php /*
			foreach ($data['categorie'] as $k => $v): ?>
				<?php $var=$v['categorie']; ?>
				<option value='<?php echo $var ?>'><?php echo $var; */?></option>
				
			<?php //endforeach;?>
		</SELECT>
		<input type="submit" name="trie" value="Trier par">
	</form>-->
<br>
<a href="?ctrl=Accueil&mth=index">Retour au menu</a><br><br>

<?php include "templates/footer.php";?>