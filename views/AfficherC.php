<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
include "config.php";
unset( $_SESSION['Status']); 

$req="select * from categorie";
$db=config::getConnection();
$listP=$db->query($req) ;

 
if (isset ($_POST['supprimer']))
{   
$req="delete from categorie where id=".$_POST['id'];
$sql=$db->prepare($req);
$sql->execute();


}

?>
<html>
<head>

<title> Liste des catégories </title>
<meta charset="utf-8">
<link href="cat.css" rel="stylesheet">
</head>
<body >

 <div id="content-wrapper">
  
      <div class="container-fluid">

<div style="background-color: silver ; border-width: 1px ; width: 100%"  >
	
	 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Catégories disponibles </div>
            
          <div class="card-body">
            <div class="table-responsive">
	                                                                               
</div>


<table align="center" width="100%" border="3px">
<thead>
<tr style="background-color: #413839; color: white">
<h3>
<th width="170px" scope="col"> Nom de la catégorie </th>
<th scope="col"> Réference  </th>
<th width="160px" scope="col">  Date de création </th>
<th scope="col">  Nombre de produits </th>
<th scope="col">  Description </th>
</h3>
</tr>
</thead>
<?php
foreach ($listP as $catego)
{
echo("<tr>");
echo('<td>'.$catego['nomC'].'</td>');

echo('<td>'.$catego['refC'].'</td>');
 
echo('<td>'.$catego['datecreation'].'</td>');
echo('<td>'.$catego['qteP'].'</td>');

echo('<td>'.$catego['description'].'</td>');


?>
<td>
<form method="POST" action="AfficherC.php" >
<input type="submit" name="supprimer" value="supprimer">
<input type="hidden" value="<?php echo $catego['id']; ?>" name="id">
</form>
</td>
<td>
<a href="modifierC.php?id=<?php echo $catego['id']; ?>">
Modifier
</a>
<?php
echo("</tr>");

}?>
</table>
</br>
<form method="get" action="ajouterC.php" align="center">
   <button type="submit"> <a>  Ajouter une autre categorie </a> </button>

	
</form>
</body>
 
</html>
</br>
</br>
</br>
</br>
   <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>  