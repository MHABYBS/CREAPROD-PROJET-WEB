<?PHP
class livraison{
	private $id ;
	private $id_cmd;
	private $nom;
	private $prenom;
	private $numero;
	private $adresse;
	private $etat;
	private $date;
	private $prix_total ;
	function __construct($id,$id_cmd,$nom,$prenom,$numero,$adresse, $etat,$date,$prix_total){
		$this->id=$id;
		$this->id_cmd=$id_cmd;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->numero=$numero;
		$this->adresse=$adresse;
		$this->etat=$etat;
		$this->date=$date;
		$this->prix_total=$prix_total ;
	}
	
	function getid(){
		return $this->id;
	}

	function getid_cmd(){
		return $this->id_cmd;
	}

	function getnom(){
		return $this->nom;
	}

	function getprenom(){
		return $this->prenom;
	}

	function getnumero(){
		return $this->numero;
	}

	function getadresse(){
		return $this->adresse;
	}

	function getetat(){
		return $this->etat;
	}

	function getdate(){
		return $this->date;
	}

	function getprixTotal()
	{
		return $this->prix_total ;
	}
	
}

?>