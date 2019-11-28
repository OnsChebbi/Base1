<?PHP
include "../core/categorieC.php";
$categorieC=new categorieC();
if(isset($_POST['Supp_btn']))
	$categorieC->supprimercategorie($_POST['Supp_categorie']);
	header('Location: ../../../afficherC.php');


?>