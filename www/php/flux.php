<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function selectFlux(PDO $db){

    $sql = "SELECT
            *

			FROM fichevin

			ORDER BY ID DESC

			LIMIT 0,6

          ";

    $req = $db->prepare($sql);
    $req->execute();

    $tab = $req->fetchAll(PDO::FETCH_ASSOC);

    return $tab;

}
/** FIN FONCTION **/

/* REQUETE */
    $tab = selectFlux($db);
    echo json_encode($tab);