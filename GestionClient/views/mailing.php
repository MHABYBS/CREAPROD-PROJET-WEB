<?php
include "adminHeader.php" ;
?>
<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script type="text/javascript" src="script/mailing.js"></script> 
       <style type="text/css">
         input[type='button']{
          font-size: 30px ;
          color: white ;
          background-color:  #588d9b ;
          border-radius: 8px ;
          border:none;
          margin-top: 30px ;
          width: 200px;
         }

         input[type='button']:hover{
            cursor: pointer;
            opacity: 0.6; 

          }
       </style>
  </head>
   	<body>
 	   <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Envoyer Mail</h4>
                    </div>
                </div>
                 <div class="row" style="margin-left: 210px;margin-bottom: 20px ;">
                   <p style="color: darkred ; font-size: 16px;" id="Error">*</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="sendEmail.php" id="mailing"> 
                          <div class="form-group">
                            <input class="form-control" type="email" name="to" id="to" placeholder="To">
                          </div>  
                          <div class="form-group">
                            <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject">
                          </div>   
                          <div class="form-group">
                                <textarea class="form-control" rows="6" cols="30" id="msg" name="msg" placeholder="Message"></textarea>
                         </div>                        
                        <div class="m-t-20 text-center">
                            <input type="button" name="" value="SEND" id="" onclick="Emailvalidation();">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
    </body>            
</html>