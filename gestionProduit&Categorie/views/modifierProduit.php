<?php 
 include "adminHeader.php" ;          
 include "../core/produitC.php";
 ?>
<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script type="text/javascript" src="tinymce/tinymce.min.js"> </script>
         <script type="text/javascript" src="script/product.js"></script>
              <script type="text/javascript">
             /* tinymce.init({
              selector: '#mytextarea' 
         }) ;*/
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
           select{
            width: 100% ;
            height: 40px;
          }
        </style>
  </head>
    <body>
      <?php 
           if (isset($_GET['id'])){
               $prodC = new ProduitC() ;
                $result=$prodC->recupererProduit($_GET['id']);
              foreach($result as $row){
                $id=$row['id'];
                $nom=$row['nom'];
                $prix=$row['prix'];
                $categorie=$row['category'];
                $image=$row['image'];
                $description=$row['description'] ;
                $quantite = $row['quantite'] ;
      ?>
       <div class="page-wrapper">
          <div class="content">
              <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <h4 class="page-title">Modifier Produit</h4>
                  </div>
              </div>
               <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                 <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
              </div>
              <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <form method="POST" action="testModifProd.php" id="formAddProd">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Nom <span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="nomProd" id="nomProd" value="<?PHP echo $nom ?>" >
                                      <input type="hidden" name="idd" value="<?PHP echo $_GET['id'] ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>Prix<span class="text-danger">*</span></label>
                                      <input class="form-control" type="number" name="prix" id="prix" value="<?PHP echo $prix ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>Categorie <span class="text-danger">*</span></label><br>
                                       <select id="categorie" name="categorie" >                                       
                                           <option value="<?php echo $categorie ; ?>"  ><?php echo $categorie ; ?></option>
                                           <?php 
                                                 $cat= new ProduitC() ;
                                                 $list=$cat->afficherCategorie() ; 
                                                  if (!empty($list)) {  
                                                     foreach ($list as $val) { 
                                                      if($val['nom'] !=$categorie ){
                                                      ?>
                                                     <option value="<?php echo $val['nom'] ; ?>"><?php echo $val['nom'] ; ?></option>
                                            <?php
                                               }
                                              }
                                            }

                                           ?>
                                        </select>
                                  </div>
                                   <div class="form-group">
                                      <label>Quantite<span class="text-danger">*</span></label>
                                      <input class="form-control" type="number" name="quantite" id="quantite" value="<?PHP echo $quantite ?>">
                                  </div>
                              </div>                                      
                              <div class="col-sm-6">
                              <div class="form-group">
                                <label>image</label>
                                <div class="profile-upload">
                                  <div class="upload-input">
                                    <input type="file" class="form-control" id="prodImage" name="prodImage" value="<?PHP echo $image ?>" onchange="preview_image(event)">
                                  </div>
                                </div>
                                <div class="" id="imageView" >
                                     <img src="img/<?php echo $image ; ?>" class="myimage" id="output_image" style="max-width: 350px; max-height: 500px;">      
                                  </div>
                              </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>ID<span class="text-danger">*</span></label>
                                      <input class="form-control" type="number" name="id" id="id" value="<?PHP echo $id ?>" >
                                  </div>
                              </div>
                       </div>
                        <div class="form-group">
                              <label>Description</label>
                              <textarea class="form-control" rows="6" cols="30" id="mytextarea" name="mytextarea"  ><?PHP echo $description ?></textarea>
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
    </body>

</html>
