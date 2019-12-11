
 <?php 
include('SecuriteLogin.php');
include('includes/header.php');
include('includes/navbar.php');
include('rechercher.php');
include "../cores/categorieC.php";

unset( $_SESSION['Status']); 

if (isset ($_POST['supprimer']))
{   
$req="delete from categorie where id=".$_POST['id'];
$db=config::getConnection();
$sql=$db->prepare($req);
$sql->execute();
}


function nbcateg($x)
{

$req="select * from produit";
$db=config::getConnection();
$listP=$db->query($req) ;
$nb=0;

foreach ($listP as $row) 
{
  if($x==$row['categ'])
  { 
    $nb+=1;
  }

}
return $nb;

}   


 $categ=new categorieC;
    if (isset($_GET['key'])) {
        $listC = $categ->rechercheCateg($_GET['key']);
    } else {
        $listC = $categ->affichercategorie();
    }

 

?>
<html>
<head>

            <div class="page-container">

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
           Catégories disponibles </div>
         
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-end">
                                            <div class="col-4" style="margin: 10px">
                                                <form method="get" action="AfficherC.php">
                                                    <input type="text" name="key" placeholder="chercher..." />
                                                    <input type="submit" value="chercher" placeholder="chercher..." class="btn btn-default btn-primary" />

                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">

                                            <table id="" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Réference</th>
                                                        <th>Categorie</th>
                                                        <th>Quantite produits</th>
                                                        <th>Date de creation</th>
                                                        <th>Description</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <?PHP
                                                  $table = array();
                                                  $total=0;
                                                foreach ($listC as $row) {
                                                    ?>
                                                    <tbody>
                                                        <tr> 
                                                               <td>
                                                                <?PHP echo $row['refC']; ?>
                                                            </td>
                                                            <td>
                                                                <?PHP echo $row['nomC']; 
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?PHP echo $x=nbcateg($row['nomC']);
                                                                $table[$row['nomC']]= $x;
                                                                if ($x<2){?>
                                                                <h6 style="background-color: red" > Stock presque vide. </h6>
                                                                 <?php
                                                                }?>
                                                            </td>
                                                            <td>
                                                                <?PHP echo $row['datecreation']; ?>
                                                            </td>
                                                            <td>
                                                                <?PHP echo $row['description']; 
                                                                $total+=1;?>
                                                            </td>
                                                            <td>
                                                            <form method="POST" action="AfficherC.php" >
                                                            <input style="background-color: #495156" class="btn btn-primary btn-block" type="submit" name="supprimer" value="supprimer">
                                                            <input class="btn btn-primary btn-block" type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                            </form>
                                                            </td>
                                                            <td>
                                                            <a class="btn btn-primary btn-block" href="modifierC.php?id=<?php echo $row['id'] ?>">
                                                            Modifier
                                                            </a>
                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                <?PHP

                                            }   
                                            ksort($table);
                                            
                                           
                                             
                                            
                                                ?>


                                           
                                           </table> 
                                            <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de Catégories:'.$total)?></h5>

<form method="get" action="AjouterC.php" align="center">
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter une autre catégorie </a> </button> </form>

<!--
<form method="get" action="stat.php" >
  
    <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Notre statistique  </a> </button> 

</form>
-->
</br>
</br>
  </br>
    
              

                

                 <fieldset style="border-color: white">
                <table align="center">
            <div    class="card-body">
               <?php
               $test=0;
               $chart_data='';
                foreach($table as $key => $value)
                  {

           $chart_data .= "{ idP:'".$key."', quantiteP:".$value."}, ";
                 
      
       $test+=1;
     if ($test==3)
      { break;
      }

    }
    $chart_data = substr($chart_data, 0, -2);

    ?>  </div>
           </table>
       </fieldset> 
 
              </div>
           
          </div>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>  
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 style="color: #696969" align="center">Statistique de quantité</h2>
   <h3 style="color: #4682b4" align="center"> Top 3 catégories </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
  
 </body>
</html>
<div style="width: 600px;"> 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'idP',
 ykeys:['quantiteP'],
 labels:'produit',
 hideHover:'Date',
 stacked:true
});
</script>
</div>
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