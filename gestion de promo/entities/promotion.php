<?php

  class Promotion 
  {
  	private $idPromo;
    private $idProd ;
  	private $dateDebut ;
  	private $dateFin ; 
    private $remise ;	
  	
    function __construct($idPromo,$idProd,$dateDebut,$dateFin,$remise)
    {
      $this->idPromo=$idPromo;
      $this->idProd=$idProd;
      $this->remise=$remise;
      $this->dateDebut=$dateDebut ;
      $this->dateFin=$dateFin ;
    }

    // getters 
    public function getIDPromo()
    {
      return $this->idPromo;
    }

  	public function getIDProd()
  	{
  		return $this->idProd;
  	}


  	public function getRemise()
  	{
  		return $this->remise;
  	}

  	public function getDateDebut()
  	{
  		return $this->dateDebut;
  	}

  	public function getDateFin()
  	{
  		return $this->dateFin;
  	}

  }

?>