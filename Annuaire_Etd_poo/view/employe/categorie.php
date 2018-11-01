<?php session_start(); ?>
<?php include "templates/header.php";?>
<?php $type = $_SESSION['type_compte']; ?>

<?php if (empty($_SESSION)){
	echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette page'); 
	window.location.href='?ctrl=employe&mth=login';</script>";
	//echo "<script type='text/javascript'> alert('test'); </script>";
	//header("Location: ?ctrl=Accueil&mth=index");
    //exit();
    
}

else if ($type == 0){
    echo "<script type='text/javascript'>alert('Vous devez être administrateur pour accéder à cette page'); 
	window.location.href='?ctrl=employe';</script>";
}
?>


<table>
	<thead>
		<tr>
            <th></th>
			<th>Catégorie</th>
            <th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($data['categorie']) : ?>
			<?php foreach ($data['categorie'] as $k => $v) : ?>
				<tr>
                    <td><?php echo $k+1; ?></td>
					<td><?php echo $v['categorie']; ?></td>
                    <td>
                        <a href="?ctrl=employe&mth=editCat&id=<?php echo $v['id_cat']; ?>">Modifier |</a>
						<a href="?ctrl=employe&mth=deleteCat&id=<?php echo $v['id_cat']; ?>">Supprimer</a>
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
<a href="?ctrl=employe">Retour</a><br><br>



<?php include "templates/footer.php";?>