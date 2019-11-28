<script> 
   
      
  function surligne(myform, erreur)
{
   if(erreur)
      myform.style.backgroundColor = "#fba";
   else
      myform.style.backgroundColor = "";
}

  function verifqteP(myform)
{
   var  qteP= parseInt(myform.value);
   if(isNaN(qteP) || qteP < 0 )
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }
}

  function verifRef(myform)
{  
  if(myform.value.length==0)
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }

}

function verifForm(f)
{
  
   var qtePOk = verifqteP(f.qteP);
    var refCOk = verifRef(f.refC);
   
   if(qtePOk && refCOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
 function ok()
  {
alert("Votre catégorie a été ajoutée avec succès!");
}
  </script>


<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
include "config.php";
unset( $_SESSION['Status']); 



if (isset($_POST['valider']))
{  
	$req="insert INTO categorie(refC,nomC,qteP,datecreation,description) values ('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['qteP'].",'".$_POST['datecreation']."','".$_POST['description']."')";
	 $db=config::getConnection(); 
	$sql=$db->prepare($req); 
	$sql->execute(); 
	echo "<script> ok(); </script>" ;
}

?>
<html>
<head>
<title> Ajouter CATEGORIE </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link href="cat.css" rel="stylesheet">
</head>
</br>
</br>
<head>
<body>
	 <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une nouvelle catégorie </div>
            
          <div class="card-body">
            <div class="table-responsive">

<fieldset align="center">
     <h5>
<form id="myform" method="POST" onsubmit="return verifForm(this)" > 
<label> Réference: </label>
<input type="text" class="form-control" name="refC" placeholder="Saisir la réference" value="" onblur="verifRef(this)" style="width:500px">  </br>  

  
<label> Nom de la catégorie </label> 
<input type="text" class="form-control" name="nomC" placeholder="Saisir le nom" value="" style="width:500px"> </br>

<label> Nombre de produits </label> 
<input type="number" class="form-control" name="qteP" placeholder="Nombre de produits " onblur="verifqteP(this)" value="" style="width:500px"> </br>

<label> Date de création </label>
<td><input type="Date" class="form-control" name="datecreation" placeholder="Saisir la date de création" value="" style="width:500px"> </br>
<label> Description: </label> 
<textarea type="text"  style="width:500px" name="description" value="" placeholder="Décrire cette catégorie" >
</textarea> </br>
</table>




</h4>

<input type="submit" value="valider" name="valider" > 

<input type="reset" value="Reset"> 
</fieldset>

</form>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

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
 