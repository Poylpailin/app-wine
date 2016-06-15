<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function updateDebtSituation(PDO $db, $commentaire, $note, $button_update_access){
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];
    $button_update_access = $_POST['button_update_access'];

    $sql = "
        UPDATE
          fichevin

        SET
          commentaire = :commentaire,
          note =:note

        WHERE
          id = :button_update_access
    ";

    $req = $db->prepare($sql);
    $result = $req->execute(array(
        'commentaire' => $_POST['commentaire'],
        'note' => $_POST['note'],
        'button_update_access' => $_POST['button_update_access']
    ));


    return $result;
}
/** FIN FONCTION **/

/* REQUETE */
if (isset($_POST)){
    $result = updateDebtSituation($db,$_POST['commentaire'],$_POST['note'], $_POST['button_update_access']);
    echo json_encode($result);
}else{
    echo json_encode(false);
}
