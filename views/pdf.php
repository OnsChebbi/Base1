<?php
include "../cores/produitC.php";
 $prod=new produitC;
    if (isset($_GET['key'])) {
        $listP = $prod->rechercheproduit($_GET['key']);
    } else {
        $listP = $prod->afficherproduit();
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KIMONLU- Liste de produits</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="fpdf.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body  onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <br>
          <h1><i class="fa fa-globe">Liste des produits</i> </h1>
          
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <h2>
        <br>
        From
        <address>
          <strong>KIMONLU</strong><br>
          Menzel temim<br>
          Phone: (+216)70686500<br>
          Email: KIMONLU@gmail.tn

        </address>
      </div>
      <br>
    </h2>
      <!-- /.col -->
      
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
                <table align="center"  class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
            <thead>
                  <tr >
                   
                   <th scope="col"> Photo </th>
                   <th scope="col"> Réference du produit </th>
                   <th scope="col">   Catégorie </th>
                   <th scope="col">  Nom du produit </th>
                   <th scope="col"> Prix Vente en GROS </th>
                   <th scope="col">  Prix Vente en LIGNE </th>
                  
                  <th scope="col"> Caractéristiques du produit </th>

</tr>
</thead>
  <tbody class="body">
    
    <?php
          foreach ($listP as $prod)
{

echo('<tr>');
echo('<td> <img src="produits/'.$prod['photo'].'" width="100" height="100" /> </td>'); 

echo('<td>'.$prod['ref'].'</td>');

echo('<td>'.$prod['categ'].'</td>');
 
echo('<td>'.$prod['nomP'].'</td>');

echo('<td>'.$prod['prixVG'].'</td>');

echo('<td>'.$prod['prixVL'].'</td>');

echo('<td>'.$prod['carac'].'</td>');
echo('</tr>');
}
?>
             
                  
  
</table>

    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

</body>
</html>
