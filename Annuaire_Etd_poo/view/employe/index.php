<?php include "templates/header.php";?>

<p><a href="?ctrl=employe&mth=add">Ajouter un employé</a></p>
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
			<th>Type compte</th>
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
					<td><?php echo $v['typec'];?></td>
					<td>
						<a href="?ctrl=employe&mth=show&id=<?php echo $v['id']; ?>">Lire |</a>
						<a href="?ctrl=employe&mth=edit&id=<?php echo $v['id']; ?>">Modifier |</a>
						<a href="?ctrl=employe&mth=delete&id=<?php echo $v['id']; ?>">Supprimer</a>
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
<br>
<a href="?ctrl=Accueil&mth=index">Retour au menu</a><br><br>

<?php include "templates/footer.php";?>