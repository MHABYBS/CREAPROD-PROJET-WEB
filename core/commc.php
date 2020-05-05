<?PHP
include "../config.php";

class commc {
	
	function ajoutercomm($comm){
		$sql="insert into commande (idpr,idc,qte) values (:idpr,:idc,:qte)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idpr=$comm->getidpr();
        $idc=$comm->getidc();
        $qte=$comm->getqte();
		$req->bindValue(':idpr',$idpr);
		$req->bindValue(':idc',$idc);
		$req->bindValue(':qte',$qte);

		
            $req->execute();
            return true ;
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercomm(){
		
		$sql="SElECT image,commande.id,idpr,idc,qte,date_cmd,nom  From commande inner join produit on commande.idpr=produit.id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercomm($id){
		$sql="DELETE FROM commande where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercomm($comm,$id){
		$sql="UPDATE commande SET id=:idd,date_cmd=:date_cmd,idpr=:idpr,idc=:idc,qte=:qte WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$comm->getid();
        $date=$comm->getdate();
        $idpr=$comm->getidpr();
        $idc=$comm->getidc();
        $qte=$comm->getqte();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':date_cmd'=>$date,':idpr'=>$idpr,':idc'=>$idc,':qte'=>$qte);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':date_cmd',$date);
		$req->bindValue(':idpr',$idpr);
		$req->bindValue(':idc',$idc);
		$req->bindValue(':qte',$qte);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		

	
	}
	
	function recherchercomm($id){
		 $sql="SELECT * from `commande` where id=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
	}

	 function recupererCommande($idprod,$idclt)
      {
         $sql="SELECT * from `commande` where `idpr`=$idprod and `idc`=$idclt";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

	function ajouterlivraison($livraison){
		$sql="insert into livraison (id_cmd,nom,prenom,numero,adresse,date_liv,prix_total) values (:id_cmd, :nom,:prenom,:numero,:adresse,:date_liv,:prix_total)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_cmd=$livraison->getid_cmd();
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $numero=$livraison->getnumero();
        $adresse=$livraison->getadresse();
        $date_liv=$livraison->getdate();
        $prix_total=$livraison->getprixTotal();
		$req->bindValue(':id_cmd',$id_cmd);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':date_liv',$date_liv);
		$req->bindValue(':prix_total',$prix_total);
				
            $req->execute();
            return true ;
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function rechercherCommande($search){
		$sql="SElECT image,commande.id,idpr,idc,qte,date_cmd,nom  From commande inner join produit on commande.idpr=produit.id
		WHERE commande.id LIKE '%$search%' OR idpr LIKE '%$search%' OR idc LIKE '%$search%' OR qte LIKE '%$search%' OR date_cmd LIKE '%$search%' OR nom LIKE '%$search%' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

    }

    public function TrierCommande($colonne,$order)
    {
      $sql="SElECT image,commande.id,idpr,idc,qte,date_cmd,nom  From commande inner join produit on commande.idpr=produit.id order by $colonne $order" ; 
      $db=config::getConnexion() ;
      try
      {
        $liste=$db->query($sql) ;
        return $liste ;

      }
       catch(Exception $e) 
      {
        echo "Erreur".$e->getMessage();
      }
    }


}

?>