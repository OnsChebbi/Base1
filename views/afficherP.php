<script>
function sure(){
  return confirm("Voulez-vous vraiment supprimer ce produit?");
}
</script>
<?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
unset( $_SESSION['Status']); 

include "../cores/produitC.php";


if (isset ($_POST['supprimer']))
{   
$req="delete from produit where id=".$_POST['id'];
$db=config::getConnection();
$sql=$db->prepare($req);
$sql->execute();

}

 $prod=new produitC;
    if (isset($_GET['key'])) {
        $listP = $prod->rechercheproduit($_GET['key']);
    } else {
        $listP = $prod->afficherproduit();
    }



?>
<html>
<head>
  <title>KIMONLU-Stocks des produits</title>
  <meta charset="utf-8">
</head>
<body><div class="page-container">

                <div class="main-content">
                    <div class="container-fluid">

                        <div class="breadcrumb-wrapper row">
                            <div class="col-12 col-lg-3 col-md-6">
                                
                            </div>

                        </div>

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Liste des produits </div>
         
                                    </div>
                                     <div style="margin-left: 1.2em" >
                                    <a href="pdf.php"> Imprimer cette page</a>
                                  </div>
                                    <div class="card-body">
                                        <div class="row justify-content-end">
                                            <div class="col-4" style="margin: 10px">
                                                <form method="get" action="afficherP.php">
                                                    <input type="text" name="key" placeholder="chercher..." />
                                                    <input type="submit" value="chercher" placeholder="chercher..." class="btn btn-default btn-primary" />

                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                      
                                            <table id="" class="table table-bordered">
                                 
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
$total=0;
foreach ($listP as $prod)
{


echo('<td> <img src="produits/'.$prod['photo'].'" width="100" height="100" /> </td>'); 

echo('<td>'.$prod['ref'].'</td>');

echo('<td>'.$prod['categ'].'</td>');
 
echo('<td>'.$prod['nomP'].'</td>');

echo('<td>'.$prod['prixVG'].'</td>');

echo('<td>'.$prod['prixVL'].'</td>');

echo('<td>'.$prod['carac'].'</td>');
$total+=1;

?>
<td>
<td>
<form method="POST" action="afficherP.php" >
<input style="background-color: #495156" class="btn btn-primary btn-block" onclick="sure()" type="submit" name="supprimer" value="supprimer">
<input class="btn btn-primary btn-block" type="hidden" value="<?php echo $prod['id']; ?>" name="id">
</form>
</td>
<td>
<a class="btn btn-primary btn-block" href="modifierP.php?id=<?php echo $prod['id'] ?>">
Modifier
</a>
<?php
echo("</tr>");

}
?>



</table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de produits:'.$total)?></h5>
<form method="get" action="ajouterP.php" >
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter un autre produit  </a> </button>
</form>
</br>


  
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
