<?PHP
class livraison{
	private $id;
	private $nom;
	private $prenom;
	private $adresse;
	private $numero;
	function __construct($id,$nom,$prenom,$numero,$adresse){
		$this->id=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->numero=$numero;
		$this->adresse=$adresse;
	}
	
	function getid(){
		return $this->id;
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

	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom;
	}
	function setnumero($numero){
		$this->numero=$numero;
	}
	function setadresse($adresse){
		$this->adresse=$adresse;
	}
	
}

?>