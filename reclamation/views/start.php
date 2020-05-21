<?PHP
include "../entites/reclam.php";
include "../core/reclamationS.php";
$reclam=new reclam(111111,'BEN Ahmed','Salah','agontara6@gmail.com','service','merci beaucoup' ,20/12/2020);
$reclamationS=new reclamationS();
$reclamationS->afficherreclam($reclam);
echo "****************";
echo "<br>";
echo "id:".$reclam->getid();
echo "<br>";
echo "nom:".$reclam->getnom();
echo "<br>";
echo "prenom:".$reclam->getprenom();
echo "<br>";
echo "mail:".$reclam->getmail();
echo "<br>";
echo "raison:".$reclam->getraison();
echo "<br>";
echo "<br>";
echo "msg:".$reclam->getmsg();
echo "<br>";
echo "date:".$reclam->getdate();
echo "<br>";


?>