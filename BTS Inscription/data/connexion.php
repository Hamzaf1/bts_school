<?php 
$connexion=@mysqli_connect ("localhost","root","","bts") or die("Connexion à la BD impossible ! Erreur : ".mysqli_connect_error());
error_reporting(E_ALL & ~E_NOTICE);
?>