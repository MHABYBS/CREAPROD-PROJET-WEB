<?PHP
class reclam{
	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $raison;
	private $msg;
	private $date;
	function __construct($id,$nom,$prenom,$mail,$raison,$msg,$date)
	{
		$this->id=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->mail=$mail;
		$this->raison=$raison;
		$this->msg=$msg;
		$this->date=$date;
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
	function getmail(){
		return $this->mail;
	}
	function getraison(){
		return $this->raison;
	}
	function getmsg(){
		return $this->msg;
	}
	function getdate(){
		return $this->date;
	}


	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom;
	}
	function setmail($mail){
		$this->mail=$mail;
	}
	function setraison($raison){
		$this->raison=$raisoncrec;
	}
	
}

?>