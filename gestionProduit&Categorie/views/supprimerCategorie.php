<?PHP
include "../core/categorieC.php";
$cat=new CategorieC();
if (isset($_GET["id"])){
	$cat->supprimerCategorie($_GET["id"]);
	header('Location: afficherCategorie.php');
}

?>