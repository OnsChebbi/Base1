<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/GestionAdmin.php');
?>
<div id="content-wrapper">
<!--DataTables-->
<div class="card shadow mb-4">
<div class="card-header py-3">
  <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal">Ajouter Admin
  </button>
  </h6>
 
  </div>
   <?php
   if(isset($_SESSION['success']) and $_SESSION['success'] !='' )
   {
	  echo '<h2>'.$_SESSION['success'].'</h2>';
	  unset($_SESSION['success']); 
	}
	
	if(isset($_SESSION['status']) and $_SESSION['status'] !='' )
   {
	  echo '<h2>'.$_SESSION['status'].'</h2>';
	  unset($_SESSION['status']); 
	}
	
  ?>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Détails</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom D'utilisateur</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                     <?php 

        
		
		foreach($liste as $row){
	?>
	<tr>
	<th><?PHP echo $row['Username']; ?></th>
	<th><?PHP echo $row['Email']; ?></th>
	<th><?PHP echo $row['Password']; ?></th>
	<th>
    <center>
    <form method="POST" action="modifierAd.php">
     <input type="hidden" name="Modifier_user" value="<?PHP echo $row['Username']; ?>"  />
	<input type="submit" name="Modifier_btn" class="btn btn-success" value="Modifier">
     </form>
	</center>
	
	</th>
	<th> <center>
    <form method="POST" action="includes/base/views/supprimerAdmin.php">
    <input type="hidden" name="Supp_user" value="<?PHP echo $row['Username']; ?>" />
	<input type="submit" name="Supp_btn" class="btn btn-danger"  value="supprimer">
    </form>
	</center></th>
	</tr>
    
	<?PHP
}
		
?>
                </thead>
                </table>
</div>
</div>
 </div>
 </div>
 

   <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>   

  
 

