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
<html>
<head>
<title> Modifier CATEGORIE </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link href="cat.css" rel="stylesheet">
</head>
<body>
<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
include "config.php";
unset( $_SESSION['Status']); 

if (isset($_GET['id']))
{
  $req="select * from categorie where id=".$_GET['id'];
  $db=config::getConnection();
  $result=$db->query($req);

       foreach($result as $row)

     {   
           $id=$row['id'];

         $refC=$row['refC'];
         $nomC=$row['nomC'];
          $qteP=$row['qteP'];
       $datecreation=$row['datecreation'];
       $description=$row['description'];
       
   
     }
}

?>
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Modifier une catégorie </div>
            
          <div class="card-body">
            <div class="table-responsive">
     
<form id="myform" method="POST" action="updateC.php" > 
  <input type="hidden" value="<?php echo $id; ?>" name="id">
<label> Réference: </label>
<input type="text" class="form-control" name="refC" placeholder="Saisir la réference"  onblur="verifRef(this)" value="<?php echo $refC ?>" style="width:500px">  </br>   
  
<label> Nom de la catégorie </label> 
<input type="text" class="form-control" name="nomC" placeholder="Saisir le nom" value="<?php echo $nomC ?>" onblur="verifRef(this)" style="width:500px"> </br>

<label> Nombre de produits </label> 
<input type="number" class="form-control" name="qteP" placeholder="Nombre de produits " value="<?php echo $qteP?>" onblur="verifqteP(this)"  style="width:500px"> </br>

<label> Date de création </label>
<td><input type="Date" class="form-control" name="datecreation" placeholder="Saisir la date de création" value="<?php echo $datecreation ?>"  style="width:500px"> </br>
<label> Description: </label> 

<td><input type="text" class="form-control" name="description" placeholder="Saisir la description" value="<?php echo $description ?>"  style="width:500px"> </br>
<!--<textarea type="text" class="form-control"  name="description" placeholder="Décrire cette catégorie" onblur="verifRef(this)" value="<?php  $description ?>"  style="width:500px" >
</textarea> </br> -->
</table>




</h4>

<input type="submit" value="valider" name="valider" > 

<input type="reset" value="Reset"> 


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