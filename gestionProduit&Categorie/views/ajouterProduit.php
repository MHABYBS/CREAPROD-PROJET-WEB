<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script type="text/javascript" src="tinymce/tinymce.min.js"> </script>
       <script type="text/javascript" src="script/product.js"></script>
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
          select{
            width: 100% ;
            height: 40px;
            font-size: 20px;
          }
       </style>
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
   		?>
      <style type="text/css">
        .active{
          color: lightgray ;
        }
      </style>
       <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Ajouter Produit</h4>
                    </div>
                </div>
                 <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                   <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="testAjoutPrduit.php" id="formAddProd">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nomProd" id="nomProd">
                                    </div>
                                    <div class="form-group">
                                        <label>Prix<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="prix" id="prix">
                                    </div>
                                    <div class="form-group">
                                        <label>Categorie<span class="text-danger">*</span></label><br>
                                        <select id="categorie" name="categorie" >
                                          <?php
                                                 include '../core/categorieC.php';
                                                 $cat= new CategorieC() ;
                                                 $mylist=$cat->afficherCategorie() ; 
                                                  if (!empty($mylist)) {  
                                                     foreach ($mylist as $row) { ?>
                                                     <option value="<?php echo $row['nom'] ; ?>"><?php echo $row['nom'] ; ?></option>

                                            <?php
                                              }
                                            }

                                          ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantite<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="quantite" id="quantite">
                                    </div>
                                </div>                                  
                                <div class="col-sm-6">
                                <div class="form-group">
                                  <label>image</label>
                                  <div class="profile-upload">
                                    <div class="upload-input">
                                      <input type="file" class="form-control" id="prodImage" name="prodImage" onchange="preview_image(event)">
                                    </div>
                                  </div>
                                  <div class="" id="imageView" >
                                       <img src="" class="myimage" id="output_image" style="max-width: 250px; max-height: 300px;">         
                                    </div>
                                </div>
                                </div>
                         </div>
                          <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="6" cols="30" id="mytextarea" name="mytextarea"></textarea>
                         </div>                        
                        <div class="m-t-20 text-center">
                            <input type="button" name="addPromo" value="Ajouter" id="addPromo" onclick="validation();">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
   	</body>
</html>