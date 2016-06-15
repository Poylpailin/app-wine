<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function showUpdate(PDO $db, $button_update_access){
    $button_update_access = $_POST['button_update_access'];

    $sql = "SELECT
            *

			FROM fichevin

			WHERE
            id = $button_update_access

          ";

    $req = $db->prepare($sql);
    $req->execute();

    $tab = $req->fetchAll(PDO::FETCH_ASSOC);

    return $tab;
}
/** FIN FONCTION **/

/* REQUETE */
if(isset($_POST) && !empty($_POST)){
    $tab = showUpdate($db,$_POST['button_update_access']);
    echo json_encode($tab);
}else{
    echo json_encode(false);
}