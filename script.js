const  ajout = document.querySelector("#ajout")
const  affichage = document.querySelector("#affichage")
const  tableau_des_users = document.querySelector(".tableau_des_users")
const  form_ajouter = document.querySelector(".form_ajouter")
const  nb = document.querySelector(".nb")
const modif_supprimer = document.querySelector(".modif-supprimer")
const overflow = document.querySelector(".overflow")
const croix = document.querySelector(".croix")
const pas_de_user = document.querySelector(".pas-de-user")

ajout.addEventListener("click", (e)=>{
    ajout.classList.add("click")
    affichage.classList.remove("click")
    tableau_des_users.style.display="none"
    nb.style.display="none"
    form_ajouter.style.display="flex"
})
affichage.addEventListener("click", (e)=>{
    ajout.classList.remove("click")
    affichage.classList.add("click")
    tableau_des_users.style.display="flex"
    nb.style.display="flex"
    form_ajouter.style.display="none"
})


const t_body = document.querySelector("tbody")
const ligne_user=document.querySelector(".ligne_user")
if (t_body.contains(ligne_user)) {
        document.querySelector(".ligne_user").addEventListener("click", (e)=>{
        modif_supprimer.style.display="flex"
        overflow.style.display="flex"
    })
    overflow.addEventListener("click", (e)=>{
        modif_supprimer.style.display="none"
        overflow.style.display="none"
        formulaire_modification.classList.remove("affiche_element")
        bloc_suppression.classList.remove("affiche_element")
    })
    croix.addEventListener("click", (e)=>{
        modif_supprimer.style.display="none"
        overflow.style.display="none"
        formulaire_modification.classList.remove("affiche_element")
        bloc_suppression.classList.remove("affiche_element")
    })
    //Variables pour affichage/disparition des formulaires de modification/suppression
    const btn_modifier = document.querySelector(".modifier")
    const formulaire_modification = document.querySelector(".formulaire_modification_utisateur")
    const btn_supprimer = document.querySelector(".supprimer")
    const bloc_suppression = document.querySelector(".bloc_suppression")
    
    //affiche le formulaire de modification
    btn_modifier.addEventListener("click", (e)=>{
        formulaire_modification.classList.add("affiche_element")
        bloc_suppression.classList.remove("affiche_element")
    })
    
    //Affiche la div de suppression du user
    btn_supprimer.addEventListener("click", (e)=>{
        bloc_suppression.classList.add("affiche_element")
        formulaire_modification.classList.remove("affiche_element")
    })
}

if (t_body.children.length > 1) {
    document.querySelectorAll(".ligne_user").forEach(ligne => {
                ligne.addEventListener("click", (e)=>{
                            const id_ligne_cliquée = ligne.getAttribute("data-id"); // Récupère l'ID de la ligne sur laquelle j'ai cliquée pour pouvoir l'identifier et ouvri ses caractéristuiques
                            const modif_supprimer_clique = document.getElementById(`ligne-${id_ligne_cliquée}`);
                            modif_supprimer_clique.style.display="flex"
                            overflow.style.display="flex"

                        // Cacher le menu de modification et de suppression
                        overflow.addEventListener("click", (e)=>{
                                document.querySelectorAll(".modif-supprimer").forEach(modif => {
                                modif.style.display="none"
                                overflow.style.display="none"
                        
                                //Pour cacher les formulaires d'action (modif ou suppression)ouverts lorsque je clique sur la croix ou surl'overflow
                                document.querySelectorAll(".formulaire_modification_utisateur").forEach(form_modif_utilisateur => {
                                form_modif_utilisateur.style.display="none"
                                }); 
                                document.querySelectorAll(".bloc-suppression").forEach(bloc_suppression => {
                                bloc_suppression.style.display="none"
                                }); 
                                })
                        })
                        document.querySelectorAll(".croix").forEach(croix => {
                            croix.addEventListener("click", (e)=>{
                                document.querySelectorAll(".modif-supprimer").forEach(modif => {
                                modif.style.display="none"
                                overflow.style.display="none" })

                                //Pour cacher les formulaires d'action(modif ou suppression) ouverts lorsque je clique sur la croix ou surl'overflow
                                document.querySelectorAll(".formulaire_modification_utisateur").forEach(form_modif_utilisateur => {
                                form_modif_utilisateur.style.display="none"});

                                document.querySelectorAll(".bloc-suppression").forEach(bloc_suppression => {
                                bloc_suppression.style.display="none" }); 
                            })
                        });
             });
    });

    //pour afficher le formulaire précis de l'élément sur lequel j'ai cliqué à partir de l'ID
            document.querySelectorAll(".modifier").forEach( btn_modifier=> {
            btn_modifier.addEventListener("click", (e)=>{
            const btn_modifier_cliquée = btn_modifier.getAttribute("data-btn-modif"); // Récupère l'ID du bouton "modifier" sur laquelle j'ai cliquée pour pouvoir l'identifier et ouvrir le bon formulaire
            const formulaire_du_btn_modifier_clique = document.getElementById(`form_modif_numero_${btn_modifier_cliquée}`);
            formulaire_du_btn_modifier_clique.classList.add("affiche_element")

                //pour cacher la div où on modifie les infos du user quand je cliques sur le btn "supprimer"
            document.querySelectorAll(".bloc_suppression").forEach( bloc_suppression=> {
                bloc_suppression.classList.remove("affiche_element")
             })
    })
    })
    //pour afficher la div précis de l'élément "supprimer" sur lequel j'ai cliqué à partir de l'ID
    document.querySelectorAll(".supprimer").forEach(btn_supprimer=> {
        btn_supprimer.addEventListener("click", (e)=>{
            const btn_supprimer_cliquée = btn_supprimer.getAttribute("data-btn-supp"); // Récupère l'ID du bouton "supprimer" sur lequel j'ai cliquée pour pouvoir l'identifier et ouvrir le bon formulaire
            const formulaire_du_btn_supprimer_clique = document.getElementById(`form_supprimer_numero_${btn_supprimer_cliquée}`);
            formulaire_du_btn_supprimer_clique.classList.add("affiche_element")

            //pour cacher la div où on modifie les infos du user quand je cliques sur le btn "supprimer"
             document.querySelectorAll(".formulaire_modification_utisateur").forEach( formulaire_modification_utisateur=> {
                formulaire_modification_utisateur.classList.remove("affiche_element")
             })
    })
    })
} //Fin du if

//pour les actions pour faire apparaitre la div qui a (ajout admin & deconnexion) de l'admin
const menu_hamburger = document.querySelector("li > img")
const  btn_option_admin = document.querySelector(" .btn_option_admin")

menu_hamburger.addEventListener("click", (e)=>{
    btn_option_admin.classList.toggle("affiche_element")
})

