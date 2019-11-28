<?php
include "includes/base/entities/employe.php";
include "includes/base/Core/employeC.php";
?>
<?php
	if (isset($_POST['modifier'])){
	
	$admin=new Admin($_POST['username'],$_POST['email'],$_POST['password']);
	$adminC= new AdminC;
	$adminC->modifierAdmin($admin,$_POST['id']);
	
	header('location: register.php');
}
?>	