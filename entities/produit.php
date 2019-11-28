<?PHP
class produit
{
    public $ref;
    public $nomP;
    public $categ;
    public $prixVG;
    public $prixVL;
	public $carac;
    public $photo;
	

    function __construct($ref,$nomP,$categ,$nomP,$prixVG,$prixVL,$carac,$photo)
    {   $this->ref = $ref; 
        $this->nomP = $nomP;
        $this->categ = $categ;
        $this->prixVG = $prixVG;
		$this->prixVL = $prixVL;
		$this->carac = $carac;
        $this->photo = $photo;
    }
    // getter 
    function getref()
    {
        return $this->ref;
    }
    function getnomP()
    {
        return $this->nomP;
    }
    function getcateg()
    {
        return $this->categ;
    }
  
    function getprixVG()
    {
        return $this->prixVG;
    }
    function getprixVL()
    {
        return $this->prixVL;
    }
   
	function getcarac()
    {
        return $this->carac;
    }
    function getphoto()
    {
        return $this->photo;
    }
    // setter 
     function setref($ref)
    {
        return $this->ref= $ref;
    }
    function setnomP($nomP)
    {
        return $this->nomP= $nomP;
    }
        function setcateg($categ)
    {
        return $this->categ= $categ;
    }
    function setprixVG($prixVG)
    {
        return $this->prixVG =$prixVG;
    }
    function setprixVL($prixVL)
    {
        return $this->prixVL= $prixVL;
    }
 
	function setcarac($carac)
    {
        return $this->carac= $carac;
    }
    function setphoto($photo)
    {
        return $this->photo= $photo;
    }
  ?>
