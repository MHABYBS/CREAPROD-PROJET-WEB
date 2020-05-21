<?PHP
include "../config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class livraisonc {
function sendSms(){

		$service_plan_id = "7a53255bad8c49b78a4dcb9dc0d365a5";
		$bearer_token = "5f34bc827f7f4408aa2b57ee4254e7a2";
		
		$send_from = "+21693236575";
		$recipient_phone_numbers = "+21628392382"; //May be several, separate with a comma `,`.
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
		  'body' => "Restaurant carbone vous remercie pour votre livraison"
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

function afficherlivraison ($livraison){
		echo "id: ".$livraison->getid()."<br>";
		echo "Nom: ".$livraison->getNom()."<br>";
		echo "Prénom: ".$livraison->getPrenom()."<br>";
		echo "oo: ".$livraison->getadresse()."<br>";
		echo "numeroaab: ".$livraison->getnumero()."<br>";
	}
	function ajouterlivraison($livraison){
		$sql="insert into livraison (id,nom,prenom,numero,adresse) values (:id, :nom,:prenom,:numero,:adresse)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$livraison->getid();
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $numero=$livraison->getnumero();
        $adresse=$livraison->getadresse();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':adresse',$adresse);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$id){
		$sql="UPDATE livraison SET id=:idn, nom=:nom,prenom=:prenom,numero=:numero,adresse=:adresse WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idn=$livraison->getid();
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $numero=$livraison->getnumero();
        $adresse=$livraison->getadresse();
		$datas = array(':idn'=>$idn, ':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':numero'=>$numero,':adresse'=>$adresse);
		$req->bindValue(':idn',$idn);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':adresse',$adresse);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($adresse){
		$sql="SELECT * from livraison where adresse=$adresse";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        function trilivraison($id){
		$sql="SELECT * from livraison order by $id desc ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	?>
}

?>