<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style type="text/css">
         input[type='submit']{
          color: white ;
          background-color: #588d9b;
          font-size: 16px;
          border-radius: 15px;
          border-color: #588d9b;
         }

          input[type='submit']:hover{
            background-color: white ;
            color: #588d9b ;
            cursor: pointer;
          }
       </style>
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include "../core/reclamationS.php";               
   		?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Reclamations</h4>
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
        $reclamation1S=new reclamationS();
        $listereclam=$reclamation1S->afficherreclams(); 
          if(isset($_GET['search']))
             {
              $listereclam = $reclamation1S->rechercherReclamation($_GET['search']) ;
             }
         if (!empty($listereclam)) {  ?>
        <div class="row"> 
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Raison</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($listereclam as $row) {
                   ?>
                  <tr>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['nom'] ; ?></td>
                    <td><?php echo $row['prenom'] ; ?> </td>
                    <td><?php echo $row['mail'] ; ?> </td>
                    <td><?php echo $row['raison'] ; ?></td>
                    <td><?php echo $row['date'] ; ?></td>
                    <td><?php echo $row['msg'] ; ?></td>          
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="modifierReclam.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-pencil m-r-5"></i> modifier</a>
                          <a class="dropdown-item" href="supprimerReclam.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-trash-o m-r-5"></i>supprimer</a>
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
          window.location="listeReclam.php?search="+input;
         }
       </script>
    </body>
</html>