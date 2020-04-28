<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script type="text/javascript" src="tinymce/tinymce.min.js"> </script>
        <script type="text/javascript" src="script/promotion.js"></script>
         <script type="text/javascript">
         tinymce.init({
              selector: '#mytextarea' 
         }) ;
       </script>
         <style type="text/css">
         #addPromo{
          font-size: 30px ;
          color: white ;
          background-color:  #588d9b ;
          border-radius: 8px ;
          border:none;
          margin-top: 30px ;
         }

          #addPromo:hover{
            cursor: pointer;
            background-color: darkgreen ;

          }
        </style>
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include '../core/promotionC.php';

           if (isset($_GET['idpromo'])){
               $promoC = new PromotionC() ;
                $result=$promoC->recupererPromotion($_GET['idpromo']);
              foreach($result as $row){
                $idpromo=$row['id_promo'];
                $idprod=$row['id_prod'];
                $dateDebut = $row['dateDebut'] ;
                $dateFin = $row['dateFin'] ;
                $remise = $row['remise'] ;
                $image = $row['image'] ;
                $nom = $row['nom'] ;


      ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Modifier Promotion</h4>
                    </div>
                </div>
                 <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                   <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="testModif.php" id="formAddPromo">
                            <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID Promo <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="idPromo" id="idPromo" value="<?php echo $idpromo ?>">
                                        <input type="hidden" name="idd" value="<?php echo $idpromo ?>">
                                        <input class="form-control" type="hidden" name="idprod" id="idprod" value="<?php echo $idprod ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Debut <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="dateDebut" id="dateDebut" value="<?php echo $dateDebut ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Fin <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="dateFin" id="dateFin" value="<?php echo $dateFin ?>">
                                    </div>   
                                    <div class="form-group">
                                        <label>Remise En %<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="remise" id="remise" value="<?php echo $remise ?>">
                                    </div>                                 
                                </div>
                              <div class="form-group">                                
                                  <label style="margin-left: 100px;"><?php echo $nom ?></label>
                                    <div class="" id="imageView" >
                                       <img src="img/<?php echo $image ;?>" class="myimage" id="output_image" style="max-width: 350px; max-height: 450px;">         
                                    </div><br>                                    
                                </div>                                 
                         </div>                                              
                        <div class="m-t-20 text-center">
                            <input type="button" name="addPromo" value="Sauvegarder" id="addPromo" onclick="validation();">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>               

     <?php
       }
      }
     ?> 
      <script type="text/javascript">
            function validation()
        {
          
          var btn_add = document.getElementById("addPromo") ;
          var form = document.getElementById("formAddPromo") ;
           //attributes 
           var id = document.getElementById("idPromo").value ;
           var idprod = document.getElementById("idprod").value ;
           var dateDebut = document.getElementById("dateDebut").value ;
           var dateFin = document.getElementById("dateFin").value ;
           var remise = document.getElementById("remise").value ;
           var error = document.getElementById("Error") ;
           var textError="" ;
           var verif = 0 ;

          if( id=="" && remise=="" && dateDebut=="" && dateFin=="" && idprod=="" )
          {
            textError = "Erreur : veuillez renseigner tous les champs *" ;
          }
          else if(id=="")
           {
              textError = "Erreur : veuillez renseigner l'ID *" ;
           }
           else if(idprod=="")
           {
               textError = "Erreur : veuillez renseigner l'ID produit*" ;
           }
          
           else if(dateDebut == "")
           {
             textError = "Erreur : veuillez renseigner la date de debut *" ;
           }
           else if(dateFin == "")
           {
             textError = "Erreur : veuillez renseigner la date de fin *" ;
           }
           else if(dateFin<dateDebut)
           {
               textError = "Erreur : date fin non valide *" ;
           }
           else if(remise=="")
           {
              textError = "Erreur : veuillez renseigner la remise *" ;
           }
           else if((remise <= 0 ) || (remise>100))
           {
              textError = "Erreur : remise non valide *" ;
           }
           else{
            verif= 1 ;
           }

           error.innerHTML = textError  ;

           if(verif)
            {
               form.submit() ;
            }
          
        }

          </script>
    </body>

</html>
