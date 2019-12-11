<?php
$verife=false;
session_start();
//include"SecuriteLogin.php";

$instance = NULL;

     function getConnexion() 
	  {
      if (!isset($instance)) {
		try
		{
        $instance = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
		$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		 catch(Exception $e)
		  {
            die('Erreur: '.$e->getMessage());
		   }
      }
      return $instance;
    }





if(isset($_POST['login_btn']))
{
$sql="SELECT * from admin ";
		$db = getConnexion();
		try{
		$liste=$db->query($sql);
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
         foreach($liste as $row){
		if($_POST['user_login'] === $row['Username'] && $_POST['pass_login'] === $row['Password'])
		{
			$user=$row['Username'];
			$pass=$row['Password'];
			$verife=true;
		}}}
		if($verife)
		{
          $_SESSION['Username']=$user;
		  
		 header('location: index.php');
		}
		else
		
			{
		 $_SESSION['Status']='Username (and/ou) Passowrd is invalid';
		 header('location: login.php');
			}
		
		 
		 

		/*try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());}*/
?>