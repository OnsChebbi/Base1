                                    <?php 

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
    var_dump($chart_data);
    ?> 
 
 
<!DOCTYPE html>
<html>
 <head>
  <title>stat</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:1360px;">
   <h2 align="center">voici notre statistique</h2>
   <h3 align="center">statistique de quantité </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
  
 </body>
</html>
 
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
