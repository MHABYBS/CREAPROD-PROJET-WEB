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
           include '../core/categorieC.php';
           $cat= new CategorieC() ;
           $mylist=$cat->afficherCategorie() ; 
      ?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Categories</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="ajouterCategorie.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Ajouter Categorie</a>
                    </div>
                </div>
      <?php
         if (!empty($mylist)) {  ?>
        <div class="row"> 
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>     
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($mylist as $row) {
                   ?>
                  <tr>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['nom'] ; ?></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="modifierCategorie.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-pencil m-r-5"></i> modifier</a>
                          <a class="dropdown-item" href="supprimerCategorie.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-trash-o m-r-5"></i>supprimer</a>
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
  	</body>
</html>



