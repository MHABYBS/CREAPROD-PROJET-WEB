<?php 
 include "adminHeader.php" ;          
 include "../entities/client.php";
 include "../core/clientC.php";
 ?>
<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style type="text/css">
         input[type='submit']{
          font-size: 30px ;
          color: white ;
          background-color:  #588d9b ;
          border-radius: 8px ;
          border:none;
          margin-top: 30px ;
         }

            input[type='submit']:hover{
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
          if (isset($_GET['id']))
          {
            $cltC=new ClientC();
            $result=$cltC->recupererClient($_GET['id']);
            foreach($result as $row){
              $id=$row['id'];
              $nom=$row['nom'];
              $prenom=$row['prenom'];
              $mail=$row['email'];
              $address=$row['address'];
              $phone=$row['phone'];
              $pwd = $row['password'] ;
      ?>
       <div class="page-wrapper">
          <div class="content">
              <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <h4 class="page-title">Modifier Client</h4>
                  </div>
              </div>
               <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                 <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
              </div>
              <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <form method="POST" action="" id="">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Nom <span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="nom" value="<?PHP echo $nom ?>" >
                                  </div>
                                  <div class="form-group">
                                      <label>Prenom<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="prenom" value="<?PHP echo $prenom ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>Email <span class="text-danger">*</span></label><br>
                                      <input class="form-control" type="email" name="mail" value="<?PHP echo $mail ?>">
                                  </div>      
                                  <div class="form-group">
                                      <label>Phone <span class="text-danger">*</span></label><br>
                                      <input class="form-control" type="text" name="phone" value="<?PHP echo $phone ?>">
                                  </div>                               
                              </div>                                              
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>ID<span class="text-danger">*</span></label>
                                      <input class="form-control" type="number" name="id" value="<?PHP echo $id ?>" >
                                  </div>
                                  <div class="form-group">
                                      <label>Mot de passe<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="pwd" value="<?PHP echo $pwd ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>Adresse<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="address" value="<?PHP echo $address ?>">
                                  </div>
                              </div>
                       </div>                       
                      <div class="m-t-20 text-center">
                          <input type="submit" name="modifier" value="modifier" >
                      </div>
                      <input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>">
                      </form>
                  </div>
              </div>
          </div>
        </div>

     <?php
       }
      }
       if (isset($_POST['modifier'])){
        $clt=new Client($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['pwd'],$_POST['address'],$_POST['phone']);
        $cltC->modifierClient($clt,$_POST['id_ini']);
        echo $_POST['id_ini'];
        //header('Location: afficherreclam.php');?>
        <script type="text/javascript">
          window.location = "listeClient.php" ;
        </script>
      <?php
      }
      ?> 
    </body>

</html>
