<HTML>
<head>
</head>
<body>
<?PHP
include "../entites/reclam.php";
include "../core/reclamationS.php";
if (isset($_GET['id'])){
	$reclamationS=new reclamationS();
    $result=$reclamationS->recupererreclam($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$mail=$row['mail'];
		$raison=$row['raison'];
		$msg=$row['msg'];
		$date=$row['date'];
?>
<form method="POST">
<table>
<caption>Modifier Employe</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>mail</td>
<td><input type="mail" name="mail" value="<?PHP echo $mail ?>"></td>
</tr>
<tr>
<td>raison</td>
<td><input type="text" name="raison" value="<?PHP echo $raison ?>"></td>
</tr>
<td>prenom</td>
<td><input type="text" name="msg" value="<?PHP echo $msg ?>"></td>
</tr>
<td>prenom</td>
<td><input type="date" name="date" value="<?PHP echo $date ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
 if (isset($_POST['modifier'])){
	$reclam=new reclam($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['raison'],$_POST['msg'],$_POST['date']);
	$reclamationS->modifierreclam($reclam,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherreclam.php');
}
?>
</body>
</HTMl>