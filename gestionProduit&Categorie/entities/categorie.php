<?php


class Categorie
{
	private $id ;
	private $nom ;
	
	function __construct($id,$nom)
	{
		$this->id=$id ;
		$this->nom=$nom;
		
	}

	 // getters 
    public function getID()
    {
      return $this->id;
    }

  	public function getNom()
  	{
  		return $this->nom;
  	}
}

?>