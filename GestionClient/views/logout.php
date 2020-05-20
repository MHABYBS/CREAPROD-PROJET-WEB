<?php
// On dÃ©marre la session
session_start ();

// On dÃ©truit les variables de notre session
session_unset ();

// On dÃ©truit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: index.php');
?>

