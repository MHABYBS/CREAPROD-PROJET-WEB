<?PHP
include "../config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
         $sql="SELECT * from `commande` where `idpr`=$idprod and `idc`=$idclt order by `date_cmd` asc ";
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

    function sendSms(){

    $service_plan_id = "7a53255bad8c49b78a4dcb9dc0d365a5";
    $bearer_token = "5f34bc827f7f4408aa2b57ee4254e7a2";
    
    $send_from = "+21624727933";
    $recipient_phone_numbers = "+21624669743" ; //May be several, separate with a comma `,`.
    $message = "Restaurant carbonne vous remercie pour votre livraison ";
    
    // Check recipient_phone_numbers for multiple numbers and make it an array.
    if(stristr($recipient_phone_numbers, ',')){
      $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
    }else{
      $recipient_phone_numbers = [$recipient_phone_numbers];
    }
    
    // Set necessary fields to be JSON encoded
    $content = [
      'to' => array_values($recipient_phone_numbers),
      'from' => $send_from,
      'body' => "Restaurant carbone vous remercie pour votre livraison "
    ];
    
    $data = json_encode($content);
    
    $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
    $authorization = "Authorization: Bearer 5f34bc827f7f4408aa2b57ee4254e7a2";
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',$authorization));
  
  
  
  
  
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  
    $result = curl_exec($ch);
  
    if(curl_errno($ch)) {
      echo 'Curl error: ' . curl_error($ch);
    } else {
      echo $result;
    }
    curl_close($ch);
  }


}

?>