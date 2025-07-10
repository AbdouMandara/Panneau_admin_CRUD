<?php
        // require '../conn_dbb.php';
    if (isset($_POST["ajouter_user"])) {
        // 1. Récupérer et nettoyer les données
        $nom_user =trim($_POST["nom_user"]); 
        $email_user =trim($_POST["email_user"]);

        // 2. Préparer la requête pour éviter les injections SQL (Très important !)
        $sql_inserer_user = "INSERT INTO utilisateur (nom_user, email) VALUES(?, ?)";
        $stmt = mysqli_prepare($conn, $sql_inserer_user);

        // 3. Lier les variables à la requête préparée
        // "ss" signifie que les deux variables sont des chaînes de caractères (strings)
        mysqli_stmt_bind_param($stmt, "ss", $nom_user, $email_user);
         if (mysqli_stmt_execute($stmt)) {
             header("Location:../admin_infos/index_admin.php");
             exit();
        }
        // 5. Fermer le statement
        mysqli_stmt_close($stmt);
        
    
} ?>
<form action="" method="POST" class="form_ajouter">
            <p>Veuillez remplir les informations du nouvel utilisateur :</p>
                <div>
                    <label for="nom_user">Nom de l'utilsateur : </label>
                    <input type="text" name="nom_user" id="nom_user" required>
                </div>

                <div>
                    <label for="email_user">E-mail de l'utilsateur : </label>
                    <input type="email" name="email_user" id="email_user" required>
                </div>
                <button name="ajouter_user">Envoyer les données !</button>
</form>