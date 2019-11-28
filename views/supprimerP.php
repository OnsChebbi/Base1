<?PHP
include "../core/produitC.php";
$produitC=new produitC();
if(isset($_POST['Supp_btn']))
	$produitC->supprimerproduit($_POST['Supp_produit']);
	header('Location: ../../../afficherP.php');


?>