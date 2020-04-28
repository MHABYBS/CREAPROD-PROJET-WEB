<?php
    include "../entities/promotion.php";
    include "../core/promotionC.php" ;

     if( isset($_POST['idPromo']) && isset($_POST['idprod'])  && isset($_POST['dateFin']) && isset($_POST['dateDebut']) && isset($_POST['remise']) && isset($_POST['idd']))
        {
          if(!empty($_POST['idPromo']) && !empty($_POST['idprod']) && !empty($_POST['dateDebut']) && !empty($_POST['dateFin']) && !empty($_POST['remise']) && !empty($_POST['idd']) )
          {
              $promo=new Promotion($_POST['idPromo'],$_POST['idprod'],$_POST['dateDebut'],$_POST['dateFin'],$_POST['remise']);
              $promoC = new PromotionC () ;
              $promoC->modifierPromotion($promo,$_POST['idd']) ;
             header('Location: listePromo.php');
              //echo "string";
              
          }
          else { echo "empty" ;}

        }else { echo "missed";}
 ?>