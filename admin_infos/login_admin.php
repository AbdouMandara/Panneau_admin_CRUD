<?php
include_once '../conn_dbb.php';

if (isset($_POST["submit_connexion"])) {
    $email_envoyé = $_POST["email_envoyé"];
    $password_envoyé = $_POST["password_envoyé"];
    $sql_login ="SELECT * FROM admin WHERE user_email='$email_envoyé' ";
    $req_login = mysqli_query($conn, $sql_login);  
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Page de connexion (Admin)</title>
     <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
     <link rel="stylesheet" href="../style.css">
</head>
<body id="body_creation_et_login_admin">
    <form action=""  method="POST" class="formulaire_creation_et_login_admin">
        <li>Page de connexion de l'admin</li>
        <?php
             include_once"message_alert.php";
        ?>
        <h4>Si t'es l'admin, entre les bonnes infos (j'suis sur que t'es pas cap 🤣) :</h4>

        <input style="margin-top: 2em;" type="email" name="email_envoyé" placeholder="Entre ton E-mail : " required>
        <input type="password" name="password_envoyé" placeholder="Entre ton mot de passe : " required>

        <button type="submit" value="login"  name="submit_connexion">Oui, c'est moi l'admin</button>
    </form>
    
</body>
</html>