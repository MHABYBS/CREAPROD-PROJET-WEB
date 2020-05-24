<?PHP
session_start();
include "../entities/comm.php";
include "../core/commc.php";
include "../entities/livraison.php" ;

//echo "here we go" ;
if(isset($_SESSION['shopping_cart']) && isset($_SESSION['login']))
{
    foreach ($_SESSION['shopping_cart'] as $key => $value) {

         $idp = $value['item_id'] ;
         $idc = $_SESSION['ID'] ;
         $qte = $value['item_quantity'] ;
         $cmd = new comm(0,0,$idp,$idc,$qte) ;
         $cmdC = new commc() ;
         $test = $cmdC->ajoutercomm($cmd) ;
         if($test)
         {
            $to = $_SESSION ['login'] ;
           $subject = "Confirmation de commander";
           $message = "Bonjour \n Votre commande a été passer \n vous pouvez à tout temps consulter l'etat de votre commande dans votre profil \n vous allez la recevoir le plutot possible ! \n Bonne journée.";
            //echo "ajout avec success";
            $retval = mail ($to,$subject,$message);
            /*if( $retval == true ) {
                echo "Message sent successfully...";
             }else {
                echo "Message could not be sent...";
             }*/
         }
         else{
            echo "got bug";
         }
    }
}
else
{
    echo "veuillez vous connectez";
}


if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['date']))
{
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['date']))
    {
        if(isset($_SESSION['shopping_cart']) && isset($_SESSION['login']))
          {
            foreach ($_SESSION['shopping_cart'] as $key => $values) {

                 $nom = $_POST['nom'] ;
                 $prenom = $_POST['prenom'] ;
                 $phone = $_POST['phone'] ;
                 $address = $_POST['address'] ;
                 $date = $_POST['date'] ;
                 $totalprice =($values['item_quantity'] * $values['item_price']) ;
                 // echo $totalprice;
                 $cm = new commc() ;
                 $liste = $cm->recupererCommande($values['item_id'],$_SESSION['ID']) ;
                 if(!empty($liste))
                 {
                    foreach ($liste as $row) {                       
                          $idcmd = $row['id'] ;
                    }
                 }

                 $liv = new livraison(0,$idcmd,$nom,$prenom,$phone,$address,0,$date,$totalprice) ;
                 //echo $liv->getprixTotal() ;
                 $livC = new commc() ;
                 $test = $livC->ajouterlivraison($liv) ;                
                 if($test)
                 {
                    unset($_SESSION['shopping_cart']) ;
                    //$livC->sendSms();
                    //header('Location : profile.php') ;?>
                    <script type="text/javascript">
                        window.location = "profile.php?cmd" ;
                    </script>
                 <?php }
                 else{
                   echo "got bug";
                 }
            }
        }
    }

 }

?>
