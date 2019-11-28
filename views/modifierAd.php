<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?> 

<?PHP


$instance = NULL;

     function getConnexion() {
      if (!isset($instance)) {
		try{
        $instance = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
		$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return $instance;
    }
	
	
	
function recupererAdmin($user){
		$sql="SELECT * from admin ";
		$db = getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
if (isset($_POST['Modifier_btn'])){
	
    $result=recupererAdmin($_POST['Modifier_user']);
	foreach($result as $row){
		if($_POST['Modifier_user']===$row['Username'])
		{
		$user=$row['Username'];
		$email=$row['Email'];
		$pass=$row['Password'];	
		?>
<div id="content-wrapper">
<form method="POST" action="modifierAdmin.php">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Détails</div>
          <div class="card-body">
            <div class="table-responsive">
            
              <div class="modal-body">
       
        <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Username</span>
  </div>
  <input type="text" class="form-control" value="<?PHP echo $user ?>" name="username" aria-describedby="addon-wrapping">
</div>
         
       <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Email</span>
  </div>
  <input type="email" class="form-control" value="<?PHP echo $email ?>" name="email" aria-label="Username" aria-describedby="addon-wrapping">
</div>
        
       <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Password</span>
  </div>
  <input type="hidden" class="form-control" value="<?PHP echo $pass ?>" name="password" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<center>
    <input type="hidden" class="form-control" value="<?PHP echo $user ?>" name="id" aria-label="Username" aria-describedby="addon-wrapping">
    <input type="submit"  name="modifier" class="btn btn-primary" data-toggle="modal" >
  <a href="register.php" class="btn btn-danger">Annuler</a> 
  </center>           
</div>
 
</div>

 </div>
 </form>
 </div>
 
<?PHP
		}
		

	}
}




?>
  

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>   