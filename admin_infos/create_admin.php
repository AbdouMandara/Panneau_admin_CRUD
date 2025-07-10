<?php
include_once '../conn_dbb.php';

//recuperation données et execution des requetes
if (isset($_POST["submit"]))  {

$nom=$_POST["nom"];
$email=$_POST["email"];
$password=$_POST["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT); //pour hasher le pasword donc coder le mot de passe entré en plusieurs autres caractères
$sql = "INSERT INTO admin (user_email, user_name, user_password) VALUES ('$email', '$nom', '$password_hash')";
}
?>

<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Ajout d'un admin</title>
</head>
<body id="body_creation_et_login_admin">
    <form action="" method="POST" class="formulaire_creation_et_login_admin">
        <li>Ajout d'un admin</li>
        <?php
        include_once"message_alert.php";
        ?>
        <h4>Pour ajouter un admin, veuillez remplir ce formulaire :</h4>

        <input type="email"  name="email" placeholder="Entrez l' email du nouveau admin">
        <input type="text" name="nom" placeholder="Entrez le nom du nouveau admin">
        <input type="password" name="password"  placeholder="Son mot de passe ...">

        <button type="submit" name="submit">Enregistrer l'admin</button>

        
    </form>
</body>
</html>