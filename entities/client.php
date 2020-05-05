<?php

  class Client 
  {
    private $id;
  	private $nom ;
  	private $prenom ;
  	private $email ;
    private $password ;
  	private $address ;
    private $phone ;
  	

    function __construct($id,$nom,$prenom,$email,$password,$address,$phone)
    {
      $this->id=$id;
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->email=$email ;
      $this->address=$address;
      $this->password=$password;
      $this->phone=$phone ;

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
    public function getPrenom()
    {
      return $this->prenom;
    }
  	public function getAdresse()
  	{
  		return $this->address;
  	}
  	public function getEmail()
  	{
  		return $this->email;
  	}
  	public function getPassword()
  	{
  		return $this->password;
  	}
  	public function getPhone()
  	{
  		return $this->phone;
  	}
	
  }

?>