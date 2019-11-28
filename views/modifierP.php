<html>
<head>
<title> Ajouter des produits </title>
<meta charset="utf-8">
</head>

<body>
</br>
</br>
<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
unset( $_SESSION['Status']); 

include "config.php";
if (isset($_GET['id']))
{
	$req="select * from produit where id=".$_GET['id'];
	$db=config::getConnection();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
           $photo=$row['photo'];
	   	   $id=$row['id'];
	       $ref=$row['ref'];
		   $categ=$row['categ'];
		   $nomP=$row['nomP'];
		   $prixVG=$row['prixVG'];
		   $prixVL=$row['prixVL'];
		   $carac=$row['carac'];
		   
	   }
}
?>
<div class="card mb-3" width='100%'>
          <div class="card-header">
            <i class="fas fa-table"></i>
            Modifier un produit </div>
            
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" cellspacing="0">
<form align="center" id="myForm" method="POST" action="updateP.php">

<input type="hidden" value="<?php echo $id; ?>" name="id">

<label> Réference </label>
<input type="text"  value="<?php echo $ref;?>" class="form-control" name="ref" placeholder="Réference du produit" style="width:400px"> </br>

<label> Catégorie </label>
<select name="categ"  >
<option> <?php echo $categ;?> </option> 
<h6>

<option> ---- </option>
<option> Huiles </option>
<option> Batteries </option>
<option> Filtres </option>
<option> Eau de refroidissement </option>
<h6>
</select>
</br>
<label> Nom du produit </label>
<input type="text"  value="<?php echo $nomP;?>" class="form-control" name="nomP" placeholder="Nom du produit" style="width:400px"> </br>
<label> Prix vente en gros </label>
<input type="number" value="<?php echo $prixVG;?>" class="form-control" name="prixVG" placeholder="Prix en Dt" style="width:400px"> </br>
<label> Prix vente en ligne </label>
<input type="number" value="<?php echo $prixVL;?>" class="form-control" name="prixVL" placeholder="Prix en Dt" style="width:400px"> </br>

<label> Caractéristiques </label>
<input type="text" value="<?php echo $carac;?>" class="form-control" name="carac" placeholder="Caractéristiques" style="width:400px"> </br>
</h5>
<img src="produits/<?php echo $photo;?>" width="100" height="100" /> </br>


<label for="photo">Choisissez la photo à insérer</label><input type="file" name="photo" enctype= "multipart/form-data" />> </br>


<input type="reset" value="Reset"> 
<a href="updateP.php?id=<?php  $id; ?>">


<input type="submit" value="Save" name="valider"> 

</form>




</br>
</br>
</br>
</br>  
</body>
</html>
  
 <?php  
include('includes/scripts.php');
include('includes/footer.php');
?>
