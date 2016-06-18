<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function updateDebtSituation(PDO $db, $commentaire, $quantite, $button_update_access){
    $commentaire = $_POST['commentaire'];
    $quantite = $_POST['quantite'];
    $button_update_access = $_POST['button_update_access'];

    $sql = "
        UPDATE
          cavevin

        SET
          commentaire = :commentaire,
          quantite =:quantite

        WHERE
          id = :button_update_access
    ";

    $req = $db->prepare($sql);
    $result = $req->execute(array(
        'commentaire' => $_POST['commentaire'],
        'quantite' => $_POST['quantite'],
        'button_update_access' => $_POST['button_update_access']
    ));


    return $result;
}
/** FIN FONCTION **/

/* REQUETE */
if (isset($_POST)){
    $result = updateDebtSituation($db,$_POST['commentaire'],$_POST['quantite'], $_POST['button_update_access']);
    echo json_encode($result);
}else{
    echo json_encode(false);
}
