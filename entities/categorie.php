<?PHP
class categorie
{
    public $refC;
    public $nomC;
    public $qteP;
    public $datecreation;
    public $description;
   
    

    function __construct($refC,$nomC,$qteP,$nomC,$datecreation,$description)
    {   $this->refC = $refC; 
        $this->nomC = $nomC;
        $this->qteP = $qteP;
        $this->datecreation = $datecreation;
        $this->description = $description;
        
    }
    // getter 
    function getrefC()
    {
        return $this->refC;
    }
    function getnomC()
    {
        return $this->nomC;
    }
    function getqteP()
    {
        return $this->qteP;
    }
  
    function getdatecreation()
    {
        return $this->datecreation;
    }
    function getdescription()
    {
        return $this->description;
    }
   
  
    // setter 
     function setrefC($refC)
    {
        return $this->refC= $refC;
    }
    function setnomC($nomC)
    {
        return $this->nomC= $nomC;
    }
        function setqteP($qteP)
    {
        return $this->qteP= $qteP;
    }
    function setdatecreation($datecreation)
    {
        return $this->datecreation =$datecreation;
    }
    function setdescription($description)
    {
        return $this->description= $description;
    }
 

  ?>
