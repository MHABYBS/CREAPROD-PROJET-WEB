<?PHP
include "../core/reclamationS.php";
$reclamation1S=new reclamationS();
$listereclam=$reclamation1S->afficherreclams();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>id</td>
<td>nom</td>
<td>prenom</td>
<td>mail</td>
<td>raison</td>
<td>msg</td>
<td>date</td>
<td>modifier</td>
<td>supprimer</td>
</tr>

<?PHP
foreach($listereclam as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['mail']; ?></td>
	<td><?PHP echo $row['raison']; ?></td>
	<td><?PHP echo $row['msg']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><form method="POST" action="supprimerreclam.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierreclam.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	<td><form method="POST" action="contact.html">
		<input type="submit" name="Envoyer" value="Envoyer">
	</form>
	</td>
	</tr>
	<?PHP
}
?>
</table>


