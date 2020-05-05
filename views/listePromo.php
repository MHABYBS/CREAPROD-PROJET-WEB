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
          margin-left: 200px;
         }
         .print i{
          color: gray ;
         }

         .print i:hover{
          color: #588d9b ;
          cursor: pointer;
         }
         .print select{
           font-size: 20px;
           margin-right: 50px ;
           padding: 5px;
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
          window.location="listePromo.php?tri="+input;
        }
       </script>
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
                      <div class="print">
                          <select id="tri" onchange="trierPar();">
                            <option value="0">-- filtrer par --</option>
                            <option value="id_up">id croissant</option>
                            <option value="id_down">id decroissant</option>
                            <option value="id_prod_up">id produit croissant</option>
                            <option value="id_prod_down">id produit decroissant</option>
                            <option value="nom_up"> nom a .. z </option>
                            <option value="nom_down"> nom z ..a </option>
                            <option value="rem_up">remise croissante</option>
                            <option value="rem_down">remise decroissante</option>
                            <option value="date_up">date croissante</option>
                            <option value="date_down">date decroissante</option>
                          </select>
                          <i class="fa fa-print "  style="margin-right: 50px;" onclick="printDiv('divPromo');"> </i>
                    </div> 
                </div>
      <?php
           $promoC = new PromotionC() ;
           $mylist=$promoC->afficherPromotion() ; 
           if(isset($_GET['search']))
           {
            $mylist = $promoC->rechercherPromotion($_GET['search']) ;
           }

           if(isset($_GET['tri']))
             {
                if($_GET['tri'] == "id_up")
                {
                  $mylist= $promoC->TrierProduit('id','asc') ;
                }
                else if($_GET['tri'] == "id_down")
                {
                  $mylist= $promoC->TrierProduit('id','desc') ;
                }
                else if($_GET['tri'] == "nom_up")
                {
                  $mylist= $promoC->TrierProduit('nom','asc') ;
                }
                else if($_GET['tri'] == "nom_down")
                {
                  $mylist= $promoC->TrierProduit('nom','desc') ;
                }
                else if($_GET['tri'] == "rem_up")
                {
                   $mylist= $promoC->TrierProduit('remise','asc') ;
                }
                else if($_GET['tri'] == "rem_down")
                {
                   $mylist= $promoC->TrierProduit('Remise','desc') ;
                }
                else if($_GET['tri'] == "id_prod_up")
                {
                   $mylist= $promoC->TrierProduit('id_prod','asc') ;
                }
                else if($_GET['tri'] == "id_prod_down")
                {
                   $mylist= $promoC->TrierProduit('id_prod','desc') ;
                }
                else if($_GET['tri'] == "date_up")
                {
                   $mylist= $promoC->TrierProduit('dateFin','asc') ;
                }
                else if($_GET['tri'] == "date_down")
                {
                   $mylist= $promoC->TrierProduit('dateFin','desc') ;
                }
                
              
             }
         if (!empty($mylist)) {  ?>
        <div class="row"> 
          <div class="col-md-12">
            <div class="table-responsive" id="">
              <table class="table table-border table-striped custom-table datatable mb-0" id="promotion">
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
 <!-- tableau pour impression -->
          <?php
           $proC = new PromotionC() ;
           $list=$proC->afficherPromotion() ; 
           if(isset($_GET['search']))
           {
            $list = $proC->rechercherPromotion($_GET['search']) ;
           }   

          if (!empty($list)) {  ?> 
          <div class="cont" id="divPromo" style="display: none;"> 
             <table class="table table-bordered" style="margin: auto;width: 95%;text-align: center;margin-top: 0px;" >  
               <caption><h1>Liste Promotions</h1></caption><br><br><br><br>     
                <thead>
                  <th>Image</th>
                  <th>ID </th>
                  <th>ID Prod</th>
                  <th>Nom</th>
                  <th>Remise</th>
                  <th>Date Debut</th>
                  <th>Date Fin</th>
                </thead>
             <tbody>
              <?php
                  foreach ($list as $value) {
              ?>
              <tr>
                <td><img width="50px" height="50px" src="img/<?php echo $value['image'] ?>"  alt=""></td>
                <td><?php echo $value['id_promo'] ; ?></td>
                <td><?php echo $value['id_prod'] ; ?></td>
                <td><?php echo $value['nom']; ?></td>
                <td><?php echo $value['remise'] ; ?> %</td>
                <td><?php echo $value['dateDebut'] ; ?></td>
                <td><?php echo $value['dateFin'] ; ?></td>
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