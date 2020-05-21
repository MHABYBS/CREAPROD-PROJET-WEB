<?PHP
include "../entities/livraison.php";
include "../core/livraisonC.php";
$livraison=new livraison(75757575,'BEN Ahmed','Salah',50,20);
$livraisonC=new livraisonC();
$livraisonrC->afficherlivraison($livraison);
echo "****************";
echo "<br>";
echo "cin:".$livraison->getid();
echo "<br>";
echo "nom:".$livraison->getnom();
echo "<br>";
echo "prenom:".$livraison->getprenom();
echo "<br>";
echo "nbH:".$livraison->getnumero();
echo "<br>";
echo "tarif:".$livraison->getadresse();
echo "<br>";


?>