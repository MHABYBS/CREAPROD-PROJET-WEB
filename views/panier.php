<?php 

   include "header.php" ;
   include '../core/produitC.php';
   
  //session_start();
  //include 'header.php';

if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
     // echo '<script>window.location="menu.php"</script>';
    // header('Location: menu.php');
     echo '<script>window.location.reload(history.back());</script>' ;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    //echo '<script>window.location="menu.php"</script>';
   // header('Location: menu.php');
    echo '<script>window.location.reload(history.back());</script>';

  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        //echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="panier.php"</script>';
      }
    }
  }
}?>


<!DOCTYPE html>
<html>
   <head>
    <!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Menu carbonne restaurant</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
  <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="script/cart.js"></script>
       <style type="text/css">
      .Panier{
        height: 750px;
        background-color: white ;
      }

      .cart_table{
          text-align: center;
          border: none;
          margin: auto;
          width: 80% ;
        }
        .cart_table tr{
          font-size: 24px ;
        }
        .cart_table tr:hover{
          background-color: #eae7e0 ;
        }
        .cart_table th {
          background-color: #262626 ;
          color: white;
        }
        .cart_table a{
          text-align: center;
          text-decoration: none;
          color: #b34700 ;
        }
        .Panier input[type='button']{
          width: 200px;
          height: 40px;
          border-radius: 5px ;
          font-size: 24px;
         float: right;
         margin-right: 250px;
         margin-top: 100px;
         background-color: #b34700 ;
         color: white ;
        }
        .Panier input[type='button']:hover{
          cursor: pointer;
          background-color: #262626 ;
        }
        .conect{
          text-align: center;
          margin-top: 100px;
        }
         .conect a{
          color: #b34700 ;
         }

         /* The Modal (background) */
          .modal {
            margin: auto;
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 10px; /* Location of the box */
            left: 0;
            top: 0;
            width: 60%; /* Full width */
            height: 80%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            /*background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            margin-top: 120px;
          }

          /* Modal Content */
          .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            width: 99%;
          }

          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }

          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          #formCMD table{
            margin: auto;
            width: 80%;
            padding: 25px;
          }
           #formCMD table tr{       
           }
            #formCMD table tr td input{
              width: 350px;
              margin-top: 15px;
              height: 40px;
              margin-right: 50px;
              padding-left: 15px;
              border-radius: 5px;
            }
       </style>
       </head>
   	<body>  	
      <div class="all-page-title page-breadcrumb">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12">
          <h1>Panier</h1>
        </div>
      </div>
    </div>
  </div>
  </div>
      <div style="clear: both;margin-top: 150px;"></div>
      <h1 style="text-align: center;font-size: 40px;">Details Commandes</h1> 
      <div style="clear: both;margin-top: 50px;"></div>
      <div class="Panier">          
        <table class = "cart_table">
          <tr>
            <th>Article</th>
            <th >Nom</th>
            <th >Quantite</th>
            <th >Prix Unitaire</th>
            <th >Prix Total</th>
            <th >Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
               $prodC=new ProduitC() ;
               $ids= array_keys($_SESSION['shopping_cart']) ;
              // $liste=$prodC->getProductsShoppingCart($ids) ;
            //foreach ($mylist as $row)
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
               $mylist=$prodC->recupererProduit($values["item_id"]) ;
               foreach ($mylist as $row){     
          ?>
          <tr>
            <td><img src="img/<?php echo $row['image'] ; ?>"  style="width:100px ; height: 100px ;"></td>
            <td><?php echo $row['nom'] ; ?></td>
            <td><?php echo $values["item_quantity"]; ?></td>
            <td> <?php echo $values['item_price'] ; ?> DNT</td>
            <td><?php echo number_format($values["item_quantity"] * $values['item_price'], 2);?> DNT</td>
            <td><a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-trash-o m-r-5"></i><span class="text-danger"></span></a></td>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values['item_price']);
            }
            }
          ?>
          <tr style="color: darkred">
            <td colspan="4" align="right">Total</td>
            <td  align="right" colspan="2"> <?php echo number_format($total, 2); ?> DNT</td>
            <td></td>
          </tr>
          <?php
               
          }
          ?>
            
        </table>
        <?php 
          if(isset($_SESSION['login'])){
        ?>
        <form>
          <input type="button" id="myBtn" value="Commander"  name="">
        </form>
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
           <h1 style="text-align: center;">Passer de Commande</h1>
           <p style="text-align: center;">veuillez entrer les informations du destinataire</p>
           <p style="font-size: 16px;margin-left: 50px;color: darkred;" id="Error">*</p>
            <form id="formCMD" method="POST" action="ajoutercomm.php">
              <table>
                <tr>
                  <td> 
                     Nom <br>
                    <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom'] ?>" placeholder="Nom">
                  </td>
                  <td>
                    Prenom <br>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom'] ?>" placeholder="Prenom">
                  </td>
                </tr>
                <tr>
                  <td>
                    Telephone <br>
                    <input type="number" name="phone" id="phone" value="" placeholder="Telephone">
                  </td>
                  <td>
                    Addresse <br>
                    <input type="text" name="address" id="address" value="" placeholder="Addresse Livraison">
                  </td>
                </tr>
                <tr>
                  <td>
                    Date de Livraison 
                    <input type="date" name="date" id="date" value="">
                  </td>
                  <td><input type="hidden" name="" value=""></td>
                </tr>
              </table>
              <input style="margin-left: 25px;background-color: darkgreen;" type="button" name="" id="" value="Valider" onclick="validerPanier() ;">
            </form>
        </div>

      </div>

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            var non = document.getElementById("non");

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            non.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script>
        <?php
          }
          else{
                if(!isset($_SESSION['login'])){
             ?>
                <h1 class="conect">Veuillez vous <a href="login.php">Connecter</a> pour passer de commandes</h1>
        <?php  }
             if(!isset($_SESSION['shopping_cart'])){ ?>
              <script type="text/javascript">
                var btn = document.getElementById("myBtn");
                btn.type = "hidden" ;
              </script>

            <?php }
           }
        ?>
        
      </div>
       <br><br><br><br>
        <!-- Start Footer -->
    <?php 
    include "footer.html" ;
    ?>
  <!-- End Footer -->
  
        <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

        <!-- ALL JS FILES -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
          <!-- ALL PLUGINS -->
        <script src="js/jquery.superslides.min.js"></script>
        <script src="js/images-loded.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/baguetteBox.min.js"></script>
        <script src="js/form-validator.min.js"></script>
          <script src="js/contact-form-script.js"></script>
          <script src="js/custom.js"></script>
   	</body>
</html>