<?PHP
include "config.php";
include('../entities/categorie.php');
class categorieC
{
	function ajoutercategorie($categorie)
	{
		 $sql = "INSERT INTO categorie (refC,nomC,qteP,datecreation,description) values (:refC, :nomC, :qteP, :datecreation, :description) ";
        $db = config::getConnection();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':refC', $categorie->getrefC());
            $req->bindValue(':nomC', $categorie->getnomC());
			$req->bindValue(':qteP', $categorie->getdescriptionP());
			$req->bindValue(':datecreation', $categorie->getdatecreation());
			$req->bindValue(':description', $categorie->getdescription());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function affichercategorie()
	{
		$sql = "SELECT * FROM categorie";
		$db = config::getConnection();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimercategorie($refC)
	{
		$sql = "DELETE FROM categorie where refC= :refC";
		$db = config::getConnection();
		$req = $db->prepare($sql);
		$req->bindValue(':refC', $refC);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
