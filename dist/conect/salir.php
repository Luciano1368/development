<?php 

include 'url.php';


session_start();
session_unset();
session_destroy();

header("Location:".$uri );

?>