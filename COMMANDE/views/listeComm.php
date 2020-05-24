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

         function rechercher(){
          var input = document.getElementById("rechercher").value ;
          window.location="listeComm.php?search="+input;
         }

          function trierPar()
         {
          var input = document.getElementById("tri").value  ;
          window.location="listeComm.php?tri="+input;
        }
       </script>
      
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include "../core/commc.php";             
   		?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Commandes</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">                
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
                            <option value="qte_up">Quantité Croissante</option>
                            <option value="qte_down">Quantité Decroissante</option>
                            <option value="name_up">Nom A .. Z</option>
                            <option value="name_down">Nom Z .. A</option>
                          </select>
                          <i class="fa fa-print "  style="margin-right: 50px;" onclick="printDiv('divcmd');"></i>
                    </div>
                </div>
      <?php
        $cmdC = new commc() ; 
        $mylist=$cmdC->affichercomm() ; 
          if(isset($_GET['search']))
             {
              $mylist = $cmdC->rechercherCommande($_GET['search']) ;
             }

          if(isset($_GET['tri']))
             {
              if($_GET['tri'] == "id_up")
              {
                $mylist= $cmdC->TrierCommande('commande.id','asc') ;
              }
              else if($_GET['tri'] == "id_down")
              {
                $mylist= $cmdC->TrierCommande('commande.id','desc') ;
              }
              else if($_GET['tri'] == "name_up")
              {
                $mylist= $cmdC->TrierCommande('nom','asc') ;
              }
              else if($_GET['tri'] == "name_down")
              {
                $mylist= $cmdC->TrierCommande('nom','desc') ;
              }
              else if($_GET['tri'] == "qte_up")
              {
                 $mylist= $cmdC->TrierCommande('qte','asc') ;
              }
              else if($_GET['tri'] == "qte_down")
              {
                 $mylist= $cmdC->TrierCommande('qte','desc') ;
              }
              
             }

         if (!empty($mylist)) {  ?>
        <div class="row"> 
          <div class="col-md-12">
            <div class="table-responsive" id="">
              <table class="table table-border table-striped custom-table datatable mb-0" id="produit">                 
                <thead>
                  <tr>
                    <th>image</th>
                    <th>ID</th>
                    <th>ID Prod</th>
                    <th>ID Client</th>
                     <th>Nom</th>
                    <th>Date cmd</th>
                    <th>Quantite</th>                   
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($mylist as $row) {
                   ?>
                  <tr>
                    <td><img width="75" height="75" src="img/<?php echo $row['image'] ; ?>" class="rounded-circle m-r-5" alt=""></td>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['idpr'] ; ?></td>
                    <td><?php echo $row['idc'] ; ?></td>
                    <td><?php echo $row['nom'] ; ?> </td>
                    <td><?php echo $row['date_cmd'] ; ?></td>
                    <td><?php echo $row['qte'] ; ?></td>           
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="supprimerComm.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-trash-o m-r-5"></i>supprimer</a>
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
     
     <!-- tableau pour impression don't touch please -->
        <?php
           $p = new commc() ;
           $list=$p->affichercomm() ; 
           if(isset($_GET['search']))
           {
           // $list = $p->rechercherProduit($_GET['search']) ;
           } 

           if(isset($_GET['tri']))
             {
             /* if($_GET['tri'] == "prix_up")
              {
                $list= $p->TrierProduit('prix','asc') ;
              }
              else if($_GET['tri'] == "prix_down")
              {
                $list= $p->TrierProduit('prix','desc') ;
              }
              else if($_GET['tri'] == "name_up")
              {
                $list= $p->TrierProduit('nom','asc') ;
              }
              else if($_GET['tri'] == "name_down")
              {
                $list= $p->TrierProduit('nom','desc') ;
              }
              else if($_GET['tri'] == "qte_up")
              {
                 $list= $p->TrierProduit('quantite','asc') ;
              }
              else if($_GET['tri'] == "qte_down")
              {
                 $list= $p->TrierProduit('quantite','desc') ;
              }
              else{
                $list = $p->recupererProduitParCategorie($_GET['tri']);
              }*/
              
             }  

          if (!empty($list)) {  ?> 
          <div class="cont" id="divProduit" style="display: none;"> 
             <table class="table table-bordered" style="margin: auto;width: 95%;text-align: center;" > 
             <caption><h1>Liste Produits</h1></caption><br><br><br><br>       
                <thead>
                  <th>image</th>
                    <th>ID</th>
                    <th>ID Prod</th>
                    <th>ID Client</th>
                     <th>Nom</th>
                    <th>Date cmd</th>
                    <th>Quantite</th>                   
                </thead>
             <tbody>
              <?php
                  foreach ($list as $value) {
              ?>
              <tr>
                <td><img width="75" height="75" src="img/<?php echo $row['image'] ; ?>" class="rounded-circle m-r-5" alt=""></td>
                  <td><?php echo $row['id'] ; ?></td>
                  <td><?php echo $row['idpr'] ; ?></td>
                  <td><?php echo $row['idc'] ; ?></td>
                  <td><?php echo $row['nom'] ; ?> </td>
                  <td><?php echo $row['date_cmd'] ; ?></td>
                  <td><?php echo $row['qte'] ; ?></td> 
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