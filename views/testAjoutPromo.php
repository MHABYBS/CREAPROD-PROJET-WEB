 <?php

     include '../core/promotionC.php';
     include '../entities/promotion.php';
     if(isset($_POST['idPromo'])  && isset($_POST['dateFin']) && isset($_POST['dateDebut']) && isset($_POST['remise']) && isset($_POST['id_prod'])  )
        {
          if(!empty($_POST['idPromo']) && !empty($_POST['dateDebut']) && !empty($_POST['dateFin']) && !empty($_POST['remise'])  && !empty($_POST['id_prod']) )
          {
             $idpromo=$_POST['idPromo'] ;
             $idprod=$_POST['id_prod'] ;
             $remise=$_POST['remise'] ;
             $dateDebut=$_POST['dateDebut'] ;
             $dateFin=$_POST['dateFin'] ;
             $promo=new Promotion($idpromo,$idprod,$dateDebut,$dateFin,$remise);   
             $promoC=new PromotionC() ;
             $test=$promoC->ajouterPromotion($promo) ;
             $state = 1 ;
             $promoC->setEtatPromo($state,$idprod) ;
             if($test==true)
             {
                header('Location: listePromo.php');
             }

             else{
              echo "Echec";
            }
           }else { echo "champ vide";}

        }else { echo "champ manquant";}
?>