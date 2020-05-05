 <?php

     include '../core/clientC.php';
     include '../entities/client.php';
     if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']))
        {
          if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['phone']) )
          {
             $nom=$_POST['nom'] ;
             $prenom=$_POST['prenom'] ;
             $email=$_POST['email'] ;
             $password=$_POST['password'] ;
             $address=$_POST['address'] ;
             $phone=$_POST['phone'] ;
             $clt=new Client(0,$nom,$prenom,$email,$password,$address,$phone);   
             $cltC=new ClientC() ;
             $test=$cltC->ajouterClient($clt) ;
             if($test==true)
             {
                header('Location: index.php');
             }

             else{
              echo "Echec";
            }
           }else { echo "champ vide";}

        }else { echo "champ manquant";}
?>