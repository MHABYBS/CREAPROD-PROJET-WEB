<?PHP
include "../config.php";
class reclamationS {
function afficherreclam ($reclam)
	{
		echo "id: ".$reclam->getid()."<br>";
		echo "nom: ".$reclam->getnom()."<br>";
		echo "prenom: ".$reclam->getprenom()."<br>";
		echo "mail: ".$reclam->getmail()."<br>";
		echo "raison: ".$reclam->getraison()."<br>";
		echo "msg: ".$reclam->getmsg()."<br>";
		echo "date: ".$reclam->getdate()."<br>";
	}
	
	function ajouterreclam($reclam){
		$sql="insert into reclamation (id,nom,prenom,mail,raison,msg,date) values (:id, :nom,:prenom,:mail,:raison,:msg,:date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$reclam->getid();
        $nom=$reclam->getnom();
        $prenom=$reclam->getprenom();
        $mail=$reclam->getmail();
        $raison=$reclam->getraison();
        $msg=$reclam->getmsg();
        $date=$reclam->getdate();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':raison',$raison);
		$req->bindValue(':msg',$msg);
		$req->bindValue(':date',$date);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherreclams(){
		//$sql="SElECT * From reclam e inner join formationphp.reclam a on e.cin= a.cin";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerreclam($id){
		$sql="DELETE FROM reclamation where id= :id";
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
	function modifierreclam($reclam,$id){
		$sql="UPDATE reclamation SET id=:idd, nom=:nom,prenom=:prenom,mail=:mail,raison=:raison, msg=:msg, date=:date WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$reclam->getid();
        $nom=$reclam->getnom();
        $prenom=$reclam->getprenom();
        $mail=$reclam->getmail();
        $raison=$reclam->getraison();
        $msg=$reclam->getmsg();
        $date=$reclam->getdate();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':mail'=>$mail,':raison'=>$raison,':msg'=>$msg,':date'=>$date);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':raison',$raison);
		$req->bindValue(':msg',$msg);
		$req->bindValue(':date',$date);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		

	
	}
	
	function rechercherreclam($id){
		$sql="SELECT * from reclamation where id=:id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>