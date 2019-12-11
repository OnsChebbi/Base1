<?php
 include 'config.php';
   function calcul($x,$y)
   {
 
  $db=config::getConnection();
  $res='select count(*) as nbp from produit where x=y';
  $listP=$db->query($res) ;
  var_dump($listP);
 
}


?>