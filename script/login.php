<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>login</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="login.css">
       <script type="text/javascript" src="js/login.js"></script>
       <style type="text/css">
         .compte{
            color:white;
            background-color: black ;
            border-color: white ;
            opacity: 0.9;
      }
      .login input[type='email']{
      width: 240px ;
       height: 44px;
       margin-bottom: 20px ;
       font-size: 18px ;
       border: 1px solid #000 ;
       padding-left: 50px ;
       border-color: #588d9b ;
       border-radius: 8px ;
       }
       .login input[type='button'] ,.register input[type='button']
          {
            padding: 15px 25px ;
            background: #588d9b ;
            color: #fff  ;
            border: none; ;
            margin-bottom: 20px ;
            cursor: pointer; ;
            border-radius: 8px ;
          }
       </style>
    </head>
    <body>
      <?php 
           //include "header.php" ;
      ?>
      <div class="login" id="login">
        <img src="avatar.png" ><br>
         <label id="Error" style="color: darkred;font-size: 14px;">*</label><br>
        <form id="loginFom" method="POST" action="" >          
           <div class="form-input" style="margin-top: 20px;">
            <i class="fa fa-user fa-2x cust" aria-hidden="true"></i>
            <input type="email" name="uname" id="uname" placeholder="Entrez votre nom ou email"><br> 
            <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe "><br>
            <input type="button" name="login" id="mylogin" value="LOGIN" onclick="loginValidation();"><br>
                   <a href="">mot de passe oublié ?</a>
                   <p>vous n'avez pas de compte ?<span onclick="myFunction()">s'inscrire</span></p>
           </div>         
        </form>
      </div>
       <script type="text/javascript">
         function myFunction() {
        document.getElementById("login").style.display = "none";
        document.getElementById("regist").style.display = "block";
      }
       </script>

      <div class="register" id="regist">
        <h1>Creer un compte</h1>
        <label id="ErrorRegister" style="color: darkred;font-size: 14px;">*</label><br>
        <form method="POST" id="registerForm" action="register.php">
          <table>
            <tr>
              <td>Nom </td>
            </tr>
            <tr>
              <td>
                 <i class="fa fa-user fa-2x cust" aria-hidden="true"></i>
                     <input type="text" name="nom" id="nom" placeholder="Entrez votre nom"><br>
              </td>
            </tr>
            <tr>
              <td>Prenom </td>
            </tr>
            <tr>
              <td>
                 <i class="fa fa-user fa-2x cust" aria-hidden="true"></i>
                     <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom"><br>
              </td>
            </tr>
            <tr>
              <td>Email </td>
            </tr>
            <tr>
              <td>
                 <i class="fa fa-envelope fa-2x cust" aria-hidden="true"></i>
                     <input type="text" name="email" id="email" placeholder="Entrez votre email"><br>
              </td>
            </tr>
            <tr>
              <td>Mot de passe</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
                <input type="password" name="password" id="pwd" placeholder="Entrez votre mot de passe "><br>
              </td>
            </tr>
            <tr>
              <td>Confirmer mot de passe</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
                <input type="password" name="password1" id="password1" placeholder="Confirmer votre mot de passe "><br>
              </td>
            </tr>
            <tr>
              <td>Adresse </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-map-marker fa-2x cust" aria-hidden="true"></i>
                <input type="text" name="address" id="address" placeholder="Entrer votre adresse "><br>
              </td>
            </tr>
            <tr>
              <td>Telephone </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-phone fa-2x cust" aria-hidden="true"></i>
                <input type="text" name="phone" id="phone" placeholder="Entrer votre telephone "><br>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="margin-left: 250px ;"><input type="button" name="register" value="S'inscrire'" onclick="registerValidation();"></td>
            </tr>
            <tr>
              <td colspan="2"><p style="color: gray">vous avez dejà un compte ?<span onclick="Seconnecter()"> login</span></p></td>
            </tr>
          </table>
        </form>
      </div>
       <script type="text/javascript">
         function Seconnecter() {
        document.getElementById("login").style.display = "block";
        document.getElementById("regist").style.display = "none";
      }
       </script>
       <br><br><br><br>   

       <?php
          include '../core/clientC.php';
            if(isset($_POST['uname']) && isset($_POST['password']))
            {
              if(!empty($_POST['uname']) && !empty($_POST['password']))
              {
                 $userC = new ClientC() ;
                 $mail=$_POST['uname'] ;
                 $pwd=$_POST['password'] ;
                 $client=$userC->login("client",$mail,$pwd);
                 $admin=$userC->login("admin",$mail,$pwd); 
                 $row1 = $userC->loginRow("admin",$email,$pwd);
                 $row2 = $userC->loginRow("client",$email,$pwd) ;
              if(!$row1 && !$row2){?>
                <script type="text/javascript">
                   var error=document.getElementById("Error") ;
                   error.innerHTML="email ou mot de passe incorrect *" ;
                </script>

               <?php
                }

                 if(!empty($admin)){
                   foreach ($admin as $value) {
                    if($mail == $value['email'] && $pwd==$value['password'])
                    { 

                      session_start();
                      $_SESSION['nom'] = $value['nom'] ;
                      $_SESSION['prenom'] = $value['prenom'];
                      $_SESSION['login']=$mail;
                      $_SESSION['password']=$pwd;
                      $_SESSION['role']="admin";

                      ?>
                       <script type="text/javascript">
                         window.location = "dashboard.php" ;
                       </script>
              
                   <?php }
                  } 
                }
              if(!empty($client))
                {
                  foreach ($client as  $row) {
                    if($mail == $row['email'] && $pwd==$row['password'])
                    { 
                        session_start();
                        $_SESSION['AD_nom'] = $row['nom'] ;
                       $_SESSION['AD_prenom'] = $row['prenom'];
                        $_SESSION['AD_login']=$mail;
                        $_SESSION['AD_password']=$pwd;
                        $_SESSION['AD_role']="client";

                      ?>
                       <script type="text/javascript">
                         window.location="acceuil.php" ; // replace location by the target page
                       </script>
              
                   <?php }
                    } 
                  }

                }                                        
              }
         ?>  

       <?php 
          // include "footer.php" ;
      ?>
    </body>

</html>