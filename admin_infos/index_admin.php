<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <?php
        include_once '../conn_dbb.php';

        //Pour enregistrer les modifs sur le user
        if (isset($_POST['enregistrement_modif_user'])) {
            $id_utilisateur = $_POST['user_id'];
            $nom_user_modifié = $_POST['nom_user_modifié'];
            $email_user_modifié = $_POST['email_user_modifié'];
            $sql_modif_utilisateur = "UPDATE utilisateur SET nom_user = '$nom_user_modifié', email = '$email_user_modifié' WHERE id = $id_utilisateur";
            $req_modif_utilisateur = mysqli_query($conn, $sql_modif_utilisateur);
        }

        //Pour supprimer un user de la bdd
        if (isset($_POST['supprimer_user'])) {
                    $id_user_à_supprimer = $_POST['user_id_à_supprimer'];
                    $sql_supprimer_user = "DELETE FROM utilisateur WHERE id= ? ";
                    $stmt_supprime_user = mysqli_prepare($conn, $sql_supprimer_user);
                    mysqli_stmt_bind_param($stmt_supprime_user, "i", $id_user_à_supprimer);
                    if (mysqli_stmt_execute($stmt_supprime_user)) {
                        echo '<p class="suppression_user_confirme"> L\'utilisateur a été supprimé avec succès</p>';
                    } 
                }
        ?>
        <li>Tableau de gestion des utilisateurs<img src="liste icone noir.png" alt="menu hamburger">
            <div class="btn_option_admin">
                <a href="create_admin.php">Ajouter un admin <img src="account_circle_26dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" alt=""></a>
                <a href="login_admin.php">Deconnexion <img style="rotate: 180deg;" src="add_circle_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" alt=""></a>
            </div>
        </li>
        
        <div class="boutons">
            <button id="affichage" class="click">Afficher les utilisateurs</button>
            <button id="ajout">Ajouter un utilisateur</button>
        </div>
            
            <table class="tableau_des_users">
            <?php
            $req = mysqli_query($conn, "SELECT * FROM utilisateur ORDER BY id DESC");
            if (mysqli_num_rows($req) > 0) : ?>
                <thead>
                    <tr>
                        <td>Id utilisateur</td>
                        <td>Nom utilisateur</td>
                        <td>Adresse E-mail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($req)) : ?>
                        <tr class="ligne_user" data-id="<?= $row['id'] ?>">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nom_user'] ?></td>
                            <td><?= $row['email'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            <?php else : ?>
                <tbody>
                    <tr>
                        <td class="pas-de-user">Aucun utilisateur enregistré pour le moment 😑</td>
                    </tr>
                </tbody>
            <?php endif; ?>
        </table>
            <?php
            require_once ('../user_infos_crud/ajouter_user.php');
            ?>
        <!-- Déplacer les modals et formulaires hors du tableau -->
        <?php
        mysqli_data_seek($req, 0); // Réinitialiser le pointeur du résultat
        while ($row = mysqli_fetch_assoc($req)) : ?>
            <div class="modif-supprimer" id="ligne-<?= $row['id'] ?>">
                <li>Action sur utilisateur</li>
                <span class="croix">&times;</span>
                <p>Quelle action voulez-vous effectuer sur <b><span><?= $row['nom_user'] ?></span></b> ?</p>
                
                <div class="btn-actions">
                    <button class="modifier"data-btn-modif ="<?= $row['id'] ?>">Modifier</button>
                    <button class="supprimer" data-btn-supp="<?= $row['id'] ?>">Supprimer</button>
                </div>
                
                <!-- FORMULAIRE pour modifier les utilisateurs -->
                <form action="" id="form_modif_numero_<?= $row['id'] ?>" method="POST" class="formulaire_modification_utisateur">
                    <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                    <p>Veuillez entrer les nouvelles informations :</p>
                    
                    <input type="text" name="nom_user_modifié" id="nom_user_<?= $row['id'] ?>" required placeholder="Nouveau nom de l' utilisateur  ">
                    <input type="email" name="email_user_modifié" id="email_user_<?= $row['id'] ?>" required placeholder="Nouvel E-mail de l'utilisateur  ">

                    <button type="submit" name="enregistrement_modif_user" class="envoi_des_modifs">Enregistrer les données !</button>
                </form>

                <!-- Pour supprimer un utilisateur -->
                <form method="POST" action="" class="bloc_suppression" id="form_supprimer_numero_<?= $row['id'] ?>">
                    <input type="hidden" name="user_id_à_supprimer" value="<?= $row['id'] ?>">
                    <p>Voulez-vous supprimer <b><?= $row['nom_user'] ?></b> ?</p>
                    <div class="btn_sur_bloc_suppression">
                        <button class="oui"data-btn-oui ="<?= $row['id'] ?>" name="supprimer_user">Je ne veux plus le voir !</button>
                        <button class="non" data-btn-non="<?= $row['id'] ?>">Non !</button>
                    </div>
                </form>

            </div>
        <?php endwhile; ?>

        
            <P class="nb"><u>Nb</u>: Pour modifier ou supprimer un utilisateur, cliquez sur la ligne de cet utilisateur</P>
        </main>
        <div class="overflow"></div>
</body>
<script src="../script.js" defer></script>
</html>