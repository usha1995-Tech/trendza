<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["type"]);
unset($_SESSION["userid"]);

session_unset();
session_destroy();
header('Location: index.php');
 

?>