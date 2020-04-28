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
             /* selector: '#mytextarea' */
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
          .active{
          color: lightgray ;
        }
       </style>
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include "../core/promotionC.php" ;

           if(isset($_POST['setPromo']))
           {
            $id=$_POST['prodID'] ;
            $p = new PromotionC() ;
            $list = $p->recupererProduit($id) ;
            if(!empty($list)){
              foreach ($list as $row) {
                $image = $row['image'] ;
                $nom = $row['nom'] ;
                $price = $row['prix'] ;
              }

            }
           }
   		?>
       <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Ajouter Promotion</h4>
                    </div>
                </div>
                 <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                   <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="testAjoutPromo.php" id="formAddPromo">
                            <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID Promo <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="idPromo" id="idPromo">
                                        <input type="hidden" name="id_prod" value="<?php echo $row['id'] ; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Debut <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="dateDebut" id="dateDebut">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Fin <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="dateFin" id="dateFin">
                                    </div>
                                </div>
                              <div class="form-group">
                                  <label style="margin-left: 100px;"><?php echo $nom ?></label>
                                    <div class="" id="imageView" >
                                       <img src="img/<?php echo $image ;?>" class="myimage" id="output_image" style="max-width: 250px; max-height: 250px;">         
                                    </div><br>
                                    <label style="margin-left: 100px; color: darkred">Prix : <?php echo $price ?> DNT</label>
                                </div>                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Remise En %<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="remise" id="remise">
                                    </div>
                                </div>  
                         </div>                                              
                        <div class="m-t-20 text-center">
                            <input type="button" name="addPromo" value="Ajouter" id="addPromo" onclick="validation();">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div> 
          <script type="text/javascript">
            function validation()
        {
          
          var btn_add = document.getElementById("addPromo") ;
          var form = document.getElementById("formAddPromo") ;
           //attributes 
           var id = document.getElementById("idPromo").value ;
           var dateDebut = document.getElementById("dateDebut").value ;
           var dateFin = document.getElementById("dateFin").value ;
           var remise = document.getElementById("remise").value ;
           var error = document.getElementById("Error") ;
           var textError="" ;
           var verif = 0 ;

          if( id=="" && remise=="" && dateDebut=="" && dateFin=="" )
          {
            textError = "Erreur : veuillez renseigner tous les champs *" ;
          }
          else if(id=="")
           {
              textError = "Erreur : veuillez renseigner l'ID *" ;
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