<?php
// Pour afficher un message de succès si le nouveau "Admin" a été enregistré avec succès dans la page "create_admin.php"
if (isset($_POST["submit"]))  {
     $sql_controle_email ="SELECT * FROM admin WHERE user_email='$email' ";
    $req_controle_email = mysqli_query($conn, $sql_controle_email );
    if (mysqli_num_rows($req_controle_email) >0){
        echo '<p class="admin_dans_bdd">❎ Cet admin est déjà enregistré dans votre base de données</p>';
    }else{
        $req = mysqli_query($conn, $sql);
         if ($req) {?>
        <div class="enregistrement_confirme">
            <p><span>✅</span>Le nouvel admin a été enregistré avec succès</p>
        </div>
    <?php
    }
    }
}

//Pour afficher un message de succès si l' "Admin" s'est connecté avec succès dans la page "login_admin.php"

if (isset($_POST["submit_connexion"])) {
     if (mysqli_num_rows($req_login)>0) {
        $sql_array_login=mysqli_fetch_assoc($req_login);
        if (password_verify($password_envoyé, $sql_array_login['user_password'])) {
            header("Location:index_admin.php");
        }else {
           echo '<p class="admin_dans_bdd">❎ votre mot de passe est incorrect</p>';
     }
    }else{
       echo '<p class="admin_dans_bdd">❎ votre e-mail est incorrect</p>';
    }
}
?>