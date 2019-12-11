  <?php
    function rechercheCateg($key)
  {
    $sql="SELECT * FROM categorie WHERE refC LIKE '%$key%' OR nomC LIKE '%$key%' OR datecreation LIKE '%$key%' OR description LIKE '%$key%'";
    $db = config::getConnection();
    try {
      $liste = $db->query($sql);
      return $liste;
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
?>