<?php
$servername = 'localhost';
$username = "root";
$password="";
$db_name ="gestion_des_utilisateurs";

$conn = mysqli_connect($servername, $username, $password, $db_name);

// if ($conn) {
//   echo 'connexion réussi';
// }else{
//     die("Erreur" . mysqli_connect_error());
// }
?>