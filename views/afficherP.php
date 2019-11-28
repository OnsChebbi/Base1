<script>
function sure(){
  return confirm("Voulez-vous vraiment supprimper ce produit?");
}
</script>
<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
unset( $_SESSION['Status']); 
include('config.php');


$req="select * from produit";
$db=config::getConnection();
$listP=$db->query($req) ;


if (isset ($_POST['supprimer']))
{   
$req="delete from produit where id=".$_POST['id'];

$sql=$db->prepare($req);
$sql->execute();

 // header ('location:afficherP.php');
}

?>
<html>
<head>
  <title>KIMONLU-Stocks des produits</title>
  <meta charset="utf-8">
</head>
<body>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des produits </div>
            
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                   
                   <th scope="col"> Photo </th>
                   <th scope="col"> Réference du produit </th>
                   <th scope="col">   Catégorie </th>
                   <th scope="col">  Nom du produit </th>
                   <th scope="col"> Prix Vente en GROS </th>
                   <th scope="col">  Prix Vente en LIGNE </th>
                  
                  <th scope="col"> Caractéristiques du produit </th>
</h4>
</tr>
</thead>

<?php
foreach ($listP as $prod)
{


echo('<td> <img src="produits/'.$prod['photo'].'" width="100" height="100" /> </td>'); 

echo('<td>'.$prod['ref'].'</td>');

echo('<td>'.$prod['categ'].'</td>');
 
echo('<td>'.$prod['nomP'].'</td>');

echo('<td>'.$prod['prixVG'].'</td>');

echo('<td>'.$prod['prixVL'].'</td>');

echo('<td>'.$prod['carac'].'</td>');

?>
<td>
<td>
<form method="POST" action="afficherP.php" >
<input type="submit" name="supprimer" value="supprimer" onclick="return sure()">
<input type="hidden" value="<?php echo $prod['id']; ?>" name="id">
</form>
</td>
<td>
<a href="modifierP.php?id=<?php echo $prod['id'] ?>">
Modifier
</a>
<?php
echo("</tr>");

}
?>



</table> 
<form method="get" action="ajouterP.php" align="center">
   <button type="submit"> <a>  Ajouter un autre produit  </a> </button>
</form>
</br>


      <!-- /.container-fluid -->

  
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
