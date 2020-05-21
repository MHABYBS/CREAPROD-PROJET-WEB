<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/livraison.php";
include "../core/livraisonc.php";
if (isset($_GET['id'])){
	$livraisonC=new livraisonC();
    $result=$livraisonC->recupererlivraison($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$numero=$row['numero'];
		$adresse=$row['adresse'];
?>
<form method="POST">
<table>
<caption>Modifier livraison</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>numero</td>
<td><input type="number" name="numero" value="<?PHP echo $numero ?>"></td>
</tr>
<tr>
<td>adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="cin_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livraison=new livraison($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['numero'],$_POST['adresse']);
	$livraisonC->modifierlivraison($livraison,$_POST['cin_ini']);
	echo $_POST['cin_ini'];
	header('Location: afficherlivraison.php');
}
?>
</body>
</HTMl>