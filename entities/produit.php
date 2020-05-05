<?php

  class Produit 
  {
  	private $id;
  	private $nom ;
  	private $prix ;
  	private $image ;
    private $categorie ;
  	private $quantite ; 
    private $description ;
  	
    function __construct($id,$nom,$prix,$image,$categorie,$quantite,$description)
    {
      $this->id=$id;
      $this->nom=$nom;
      $this->prix=$prix ;
      $this->image=$image ;
      $this->categorie=$categorie;
      $this->quantite=$quantite ;
      $this->description=$description;
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

    public function getPrix()
    {
      return $this->prix;
    }

  	public function getCategorie()
  	{
  		return $this->categorie;
  	}

  	public function getImage()
  	{
  		return $this->image;
  	}

  	public function getDescription()
  	{
  		return $this->description;
  	}

  	public function getQuantite()
  	{
  		return $this->quantite;
  	}


  }

?>