<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style type="text/css">

          input[type='submit']:hover{
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
          window.location="listeLivraison.php?search="+input;
         }

          function trierPar()
         {
          var input = document.getElementById("tri").value  ;
          window.location="listeLivraison.php?tri="+input;
        }
       </script>
      
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include "../core/livraisonC.php";             
   		?>
      <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Livraisons</h4>
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
                            <option value="prix_up">Prix Croissant</option>
                            <option value="prix_down">Prix Decroissant</option>
                            <option value="date_up">date Croissante</option>
                            <option value="date_down">date Decroissante</option>
                            <option value="name_up">Nom A .. Z</option>
                            <option value="name_down">Nom Z .. A</option>
                          </select>
                          <i class="fa fa-print "  style="margin-right: 50px;" onclick="printDiv('divLivraison');"></i>
                    </div>
                </div>
      <?php
        $livC = new livraisonc() ; 
        $mylist=$livC->afficherlivraisons() ; 
          if(isset($_GET['search']))
             {
              $mylist = $livC->rechercherLivraison($_GET['search']) ;
             }

          if(isset($_GET['tri']))
             {
              if($_GET['tri'] == "prix_up")
              {
                $mylist= $livC->TrierLivraison('prix_total','asc') ;
              }
              else if($_GET['tri'] == "prix_down")
              {
                $mylist= $livC->TrierLivraison('prix_total','desc') ;
              }
              else if($_GET['tri'] == "name_up")
              {
                $mylist= $livC->TrierLivraison('produit.nom','asc') ;
              }
              else if($_GET['tri'] == "name_down")
              {
                $mylist= $livC->TrierLivraison('produit.nom','desc') ;
              }
              else if($_GET['tri'] == "date_up")
              {
                 $mylist= $livC->TrierLivraison('date_liv','asc') ;
              }
              else if($_GET['tri'] == "date_down")
              {
                 $mylist= $livC->TrierLivraison('date_liv','desc') ;
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
                    <th>Article</th>
                    <th>ID</th>
                    <th>ID Comd</th>
                    <th>Nom</th>
                     <th>Prenom</th>
                    <th>Date Livraison</th>
                    <th>Numero</th>  
                    <th>Addresse</th>
                    <th>Qte</th>
                    <th>Montant</th>
                    <th>Etat</th>                 
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($mylist as $row) {
                   ?>
                  <tr>
                    <td><img width="75" height="75" src="img/<?php echo $row['image'] ; ?>" class="rounded-circle m-r-5" alt=""></td>
                    <td><?php echo $row['nomprod'] ; ?></td>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['id_cmd'] ; ?></td>
                    <td><?php echo $row['nom'] ; ?> </td>
                    <td><?php echo $row['prenom'] ; ?></td>
                    <td><?php echo $row['date_liv'] ; ?></td>   
                    <td><?php echo $row['numero'] ; ?></td>  
                    <td><?php echo $row['adresse'] ; ?></td> 
                    <td><?php echo $row['qt'] ; ?></td>
                    <td><?php echo $row['prix_total'] ; ?> DNT</td>
                    <?php
                    if($row['etat'] == 0) {
                    ?>
                    <td> 
                       <form action="modifierLivraison.php" method="POST">
                         <input type="hidden" name="state" value="1">
                         <input type="hidden" name="id" value="<?php echo $row['id'] ; ?>">
                         <input style="color: darkred;" type="submit" name="" value="Non Livrée">
                       </form>
                    </td>
                    <?php
                      }
                    else {
                    ?>
                        <td> 
                           <form action="modifierLivraison.php" method="POST">
                             <input type="hidden" name="state" value="0">
                             <input type="hidden" name="id" value="<?php echo $row['id'] ; ?>">
                             <input style="color: darkgreen;" type="submit" name="" value="Livrée">
                           </form>
                         </td>
                     <?php
                      } 
                    ?>    
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> modifier</a>
                          <a class="dropdown-item" href="supprimerLivraison.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-trash-o m-r-5"></i>supprimer</a>
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
     
     <!-- tableau pour impression -->
        <?php
           $p = new livraisonc() ;
           $list=$p->afficherlivraisons() ; 
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
             <caption><h1>Liste Livraison</h1></caption><br><br><br><br>       
                <thead>
                    <th>image</th>
                    <th>Article</th>
                    <th>ID</th>
                    <th>ID Comd</th>
                    <th>Nom</th>
                     <th>Prenom</th>
                    <th>Date Livraison</th>
                    <th>Numero</th>  
                    <th>Addresse</th>
                    <th>Qte</th>
                    <th>Montant</th>
                    <th>Etat</th>                 
                    <th class="text-right">Action</th>                  
                </thead>
             <tbody>
              <?php
                  foreach ($list as $value) {
              ?>
              <tr>
                 <td><img width="75" height="75" src="img/<?php echo $row['image'] ; ?>" class="rounded-circle m-r-5" alt=""></td>
                <td><?php echo $row['nomprod'] ; ?></td>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['id_cmd'] ; ?></td>
                    <td><?php echo $row['nom'] ; ?> </td>
                    <td><?php echo $row['prenom'] ; ?></td>
                    <td><?php echo $row['date_liv'] ; ?></td>   
                    <td><?php echo $row['numero'] ; ?></td>  
                    <td><?php echo $row['adresse'] ; ?></td> 
                    <td><?php echo $row['qt'] ; ?></td>
                    <td><?php echo $row['prix_total'] ; ?> DNT</td>
                    <td><?php echo $row['etat'] ; ?></td> 
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