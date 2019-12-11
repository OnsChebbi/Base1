<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
require('user.php') ;
$c=new Database();
$conn=$c->connexion();
$user=new UserEmail($_POST['email'],$conn);
$u=$user->LogedinF($conn,$_POST['email']);

if (!empty($_POST[])){
	
	foreach($u as $t){
	
	if ($t['email']==$_POST['email'])
	{	
		$subject = "UN NOUVEAU PRODUIT EST AJOUTE! Ne ratez pas l'occasion.";
		$txt = "Visitez notre site à fin de retrouver nos produits incomparables!!";
		$headers = "From: donotreply@fmt.com" . "\r\n" .
		"CC: somebodyelse@example.com";
		mail($email,$subject,$txt,$headers); 
		echo '<body onLoad="alert(\'Mail envoyé\')">';
		echo '<meta http-equiv="refresh" content="0;URL=index.html">';

		
		}
	
}


?> 
</body>
</html>
