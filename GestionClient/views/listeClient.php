<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style type="text/css">
        .print{
          font-size: 40px ;
          float:right;
          margin-left: 120px;
         }
         .print i{
          color: gray ;
          margin-left: 50px;
         }

         .print i:hover{
          color: #588d9b ;
          cursor: pointer;
        }
      .print select{
        width: 300px;
        font-size: 28px;
      }
       .print select option{
        font-size: 14px;
       }
       </style>

       <script type="text/javascript">
          function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

         function trierPar()
         {
          var input = document.getElementById("tri").value  ;
          window.location="listeClient.php?tri="+input;
        }
       </script>
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include '../core/clientC.php';
   		?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Clients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Ajouter Client</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="search" name="rechercher" id="rechercher" onsearch="rechercher();" placeholder="rechercher ...">
                        </div>
                    </div>
                    <div class="print">
                        <select id="tri" onchange="trierPar();"> 
                            <option value="0">-- filtrer par --</option>
                            <option value="id_up">id Croissant</option>
                            <option value="id_down">id Decroissant</option>
                            <option value="name_up">Nom A .. Z</option>
                            <option value="name_down">Nom Z .. A</option>
                          </select>
                          <i class="fa fa-print "  style="margin-right: 50px;" onclick="printDiv('divClient');"></i>
                    </div>
                </div>
             <div class="row doctor-grid">
      <?php
           $cltC = new ClientC() ;
           $mylist=$cltC->afficherClient() ; 
           if(isset($_GET['search']))
             {
              $mylist = $cltC->rechercherClient($_GET['search']) ;
             }

            if(isset($_GET['tri']))
             {
              if($_GET['tri'] == "id_up")
              {
                $mylist= $cltC->TrierClient('id','asc') ;
              }
              else if($_GET['tri'] == "id_down")
              {
                $mylist= $cltC->TrierClient('id','desc') ;
              }
              else if($_GET['tri'] == "name_up")
              {
                $mylist= $cltC->TrierClient('nom','asc') ;
              }
              else if($_GET['tri'] == "name_down")
              {
                $mylist= $cltC->TrierClient('nom','desc') ;
              }
              
             }
         if (!empty($mylist)) {  ?>
                  <?php
                  foreach ($mylist as $row) {
                   ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="avatar.png"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="supprimerClient.php?id=<?PHP echo $row['id']; ?>" ><i class="fa fa-trash-o m-r-5"></i> supprimer</a>
                                </div>
                            </div>
                            <p>ID : <?php echo $row['id'] ?></p>
                            <h4 class="doctor-name text-ellipsis"><a href=""><?php echo $row['nom'].'  '. $row['prenom']  ;?></a></h4>  
                            <div class="user-country">
                                <i class="fa fa-lock"></i> <?php echo $row['hashed_pwd'] ?>
                            </div>
                            <div class="user-country">
                                <i class="fa fa-envelope"></i> <?php echo $row['email'] ?>
                            </div>
                            <div class="user-country">
                                <i class="fa fa-phone"></i> <?php echo $row['phone'] ?>
                            </div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row['address'] ?>
                            </div>
                        </div>
                  </div>
                   <?php
                      }
 
                 }
            ?>
          </div>
        </div>
       </div>
       <script type="text/javascript">
         function rechercher(){
          var input = document.getElementById("rechercher").value ;
          window.location="listeClient.php?search="+input;
         }
       </script>
    <!-- tableau pour impression -->
        <?php
           $clt = new ClientC() ;
           $list=$clt->afficherClient() ; 
           if(isset($_GET['search']))
           {
            $list = $clt->rechercherClient($_GET['search']) ;
           }   

          if (!empty($list)) {  ?> 
          <div class="cont" id="divClient" style="display: none;"> 
             <table class="table table-bordered" style="margin: auto;width: 95%;text-align: center;" >   
             <caption><h1>Liste Clients</h1></caption><br><br><br><br>     
                <thead>
                  <th>Image</th>
                  <th>ID </th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Email</th>
                  <th>Mot de Passe</th>
                  <th>Addresse</th>
                  <th>Telephone </th>
                </thead>
             <tbody>
              <?php
                  foreach ($list as $value) {
              ?>
              <tr>
                <td><img width="20px" height="20px" src="avatar.png"  alt=""></td>
                <td><?php echo $value['id'] ; ?></td>
                <td><?php echo $value['nom'] ; ?></td>
                <td><?php echo $value['prenom']; ?> </td>
                <td><?php echo $value['email'] ; ?></td>
                <td><?php echo $value['hashed_pwd'] ; ?></td>
                <td><?php echo $value['address'] ; ?></td>
                <td><?php echo $value['phone'] ; ?></td>
              </tr>
          <?php
           }
          ?>
        </tbody>
      </table>
       <?php
           }
          ?>
      </div>
    </body>
</html>