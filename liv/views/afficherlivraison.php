<HTML>
<head>
	<link rel="stylesheet" type="text/css" href="livraison.css">
</head>
<body>
<?PHP

include "../core/livraisonc.php";
$livraison1C=new livraisonc();
$listelivraisons=$livraison1C->afficherlivraisons();

//var_dump($listeEmployes->fetchAll());
?>

<table border="1">
<td>id</td>
<td>Nom</td>
<td>Prenom</td>
<td>numero</td>
<td>adresse</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listelivraisons as $row){
	?>
	<tr>
	<td> <?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['numero']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><form method="POST" action="supprimerlivraison.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierlivraison.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	<td><form method="POST" action="ajoutlivraison.html">
		<input type="submit" name="ajouter" value="ajouter">
	</form>
	</td>
	<td><a href="trilivraison.php?id=<?PHP echo $row['id']; ?>">
	tri</a></td>
	</tr>
	<?PHP
}
?>
</table>



</body>
</HTMl>