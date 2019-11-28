<?PHP
include "config.php";
include('../entities/produit.php');
class produitC
{
	function ajouterproduit($produit)
	{
		 $sql = "INSERT INTO produit (ref,categ,nomP,prixVG,prixVL,qte,carac) values (:ref, :categ, :nomP, :prixVG, :prixVL, :qte, :carac) ";
        $db = config::getConnection();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ref', $produit->getref());
            $req->bindValue(':categ', $produit->getcateg());
            $req->bindValue(':nomP', $produit->getnomP());
			$req->bindValue(':prixVG', $produit->getprixVG());
			$req->bindValue(':prixVL', $produit->getprixVL());
			$req->bindValue(':qte', $produit->getqte());
			$req->bindValue(':carac', $produit->getcarac());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function afficherproduit()
	{
		$sql = "SELECT * FROM produit";
		$db = config::getConnection();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerproduit($ref)
	{
		$sql = "DELETE FROM produit where ref= :ref";
		$db = config::getConnection();
		$req = $db->prepare($sql);
		$req->bindValue(':ref', $ref);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
