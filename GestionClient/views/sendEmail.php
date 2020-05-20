<?php
 if (isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['msg'])) {
      $retval = mail($_POST['to'],$_POST['subject'],$_POST['msg']);
      if($retval)
      { ?>
      	//header("Location : mailing.php") ;
      	<script type="text/javascript">
      		window.location="mailing.php" ;
      	</script>
      <?php }
      else
      {
      	echo "mail non envoyé";
      }
 }

?>