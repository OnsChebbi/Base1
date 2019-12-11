<?PHP
include "../core/categorieC.php";
$categorieC=new categorieC();
if(isset($_POST['Supp_btn']))
	$categorieC->supprimercategorie($_POST['Supp_categorie']);
	header('Location: ../../../afficherC.php');

if (isset($_POST["id"])){
	$reclamationC->supprimerReclamation($_POST["id"]);
	header('Location: afficherReclamation.php');
}


?>