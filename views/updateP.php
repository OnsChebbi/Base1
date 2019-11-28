
<?php
$link = mysqli_connect("localhost", "root", "", "projet"); 
$id=$_POST['id'];
$ref=$_POST['ref']; 
$categ=$_POST['categ'];
$nomP=$_POST['nomP'];
$prixVG=$_POST['prixVG'];
$prixVL=$_POST['prixVL'];
$carac=$_POST['carac'];
$photo=$_POST['photo'];

echo($id);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
} 
  
$sql = "UPDATE produit SET ref='$ref',categ='$categ',nomP='$nomP',prixVG='$prixVG',prixVL='$prixVL',carac='$carac',photo='$photo'  WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:afficherP.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 