<?PHP
class comm{
    private $id;	
    private $date;
    private $idpr;
    private $idc;
    private $qte;
    
	function __construct($id,$date,$idpr,$idc,$qte)
    {   $this->id=$id;
        $this->date=$date;
        $this->idpr=$idpr;
        $this->idc=$idc;
        $this->qte=$qte;     
	}
	
	function getid(){
		return $this->id;
    }
    function getdate(){
		return $this->date;
	}
	function getidpr(){
		return $this->idpr;
	}
	function getidc(){
		return $this->idc;
	}
	function getqte(){
		return $this->qte;
    }
    
	



	
    
    
	
}

?>