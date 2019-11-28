<?php
$link = mysqli_connect("localhost", "root", "", "projet"); 
$id=$_POST['id'];
$refC=$_POST['refC']; 
$nomC=$_POST['nomC'];
$datecreation=$_POST['datecreation'];
$description=$_POST['description'];

echo($id);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
} 
  
$sql = "UPDATE categorie SET refC='$refC',nomC='$nomC',datecreation='$datecreation',description='$description'  WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:afficherC.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 