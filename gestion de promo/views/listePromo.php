<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include '../core/promotionC.php';
   		?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Promotions</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="listeProd.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Ajouter Promo</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="search" name="rechercher" id="rechercher" onsearch="rechercher();" placeholder="rechercher ...">
                        </div>
                    </div>
                </div>
      <?php
           $promoC = new PromotionC() ;
           $mylist=$promoC->afficherPromotion() ; 
           if(isset($_GET['search']))
           {
            $mylist = $promoC->rechercherPromotion($_GET['search']) ;
           }
         if (!empty($mylist)) {  ?>
        <div class="row"> 
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>ID Promo</th>
                    <th>ID Prod</th>
                    <th>Remise</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($mylist as $row) {
                   ?>
                  <tr>
                    <td><img width="75" height="75" src="img/<?php echo $row['image'] ?>" class="rounded-circle m-r-5" alt=""></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['id_promo'] ; ?></td>
                    <td><?php echo $row['id_prod'] ; ?></td>
                    <td><?php echo $row['remise'] ; ?> %</td>
                    <td><?php echo $row['dateDebut'] ; ?></td>
                    <td><?php echo $row['dateFin'] ; ?></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="modifierPromo.php?idpromo=<?PHP echo $row['id_promo']; ?>"><i class="fa fa-pencil m-r-5"></i> modifier</a>
                          <a class="dropdown-item" href="supprimerPromo.php?idpromo=<?PHP echo $row['id_promo']; ?>&idprod=<?PHP echo $row['id_prod']; ?>"><i class="fa fa-trash-o m-r-5"></i>supprimer</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                   <?php
                      }
                      ?>
                </tbody>
              </table>
            </div>
          </div>
         </div>
         <?php
            }
            ?>
        </div>
       </div>

       <script type="text/javascript">
         function rechercher(){
          var input = document.getElementById("rechercher").value ;
          window.location="listePromo.php?search="+input;
         }
       </script>
    </body>
</html>