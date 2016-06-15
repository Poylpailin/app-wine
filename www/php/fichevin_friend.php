<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function selectFicheFriend(PDO $db, $button_show_fichevinfriend){
    $button_show_fichevinfriend = $_POST['button_show_fichevinfriend'];


    /* Sélectionne toutes les notes qui sont en situation = 2
       et */
    $sql = "SELECT
            *

			FROM
			fichevin

			WHERE
            user_id = $button_show_fichevinfriend

          ";

    $req = $db->prepare($sql);
    $req->execute();

    $tab = $req->fetchAll(PDO::FETCH_ASSOC);

    return $tab;

}
/** FIN FONCTION **/

/* REQUETE */
if(empty($_POST)){
    echo "Aucune donnée reçue";
}else{
    $tab = selectFicheFriend($db,$_POST['button_show_fichevinfriend']);
    echo json_encode($tab);
}