<?php
 session_start() ;

  include "../core/ClientC.php" ;
  include "../entities/Client.php" ;

  if(isset($_POST['idd']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['phone']) && isset($_POST['address']))
  {
        $password = $_POST['pwd'] ;
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        $clt=new Client($_POST['idd'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pwd'],$_POST['address'],$_POST['phone'],$hashed_pwd);
        $cltC = new ClientC() ;
        $cltC->modifierClient($clt,$_POST['idd']);
        echo $_POST['idd'];
        //header('Location: afficherreclam.php');
        $_SESSION['nom'] = $_POST['nom'] ;
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['login']=$_POST['email'];
        $_SESSION['password']=$_POST['pwd'];
       echo '<script>window.location.reload(history.back());</script>';
       // header('Location: profile.php');
 }
 else
  echo "undefined field";

?> 