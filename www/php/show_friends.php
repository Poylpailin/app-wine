<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function selectUser(PDO $db){
    $sql = "SELECT *

			FROM user

			ORDER BY id

			DESC";

    $req = $db->prepare($sql);
    $req->execute();

    $tab = $req->fetchAll(PDO::FETCH_ASSOC);

    return $tab;

}
/** FIN FONCTION **/

/* REQUETE */
$tab = selectUser($db);
echo json_encode($tab);