<?php include "templates/header.php";?>

<h2>Afficher <?php echo $employe['nom']; ?></h2>
<a href="?ctrl=employe">Retour</a><br><br>
<table>
	<tbody>
		<tr>
			<td>Prénom</td>
			<td><?php echo $employe['prenom']; ?></td>
		</tr>
		<tr>
			<td>Nom</td>
			<td><?php echo $employe['nom']; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><a href="mailto:<?php echo $employe['email']; ?>"><?php echo $employe['email']; ?></a></td>
		</tr>
		<tr>
			<td>Age</td>
			<td><a <?php echo $employe['age']; ?>"><?php echo $employe['age']; ?></a></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td><a href="https://www.google.com/maps?q=<?php echo $employe['ville']; ?>"><?php echo $employe['ville']; ?></a></td>
		</tr>
	</tbody>
</table>

<?php include "templates/footer.php";?>