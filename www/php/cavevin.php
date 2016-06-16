<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function selectNote(PDO $db, $user_id){
    $user_id = $_POST['user_id'];


    /* Sélectionne toutes les notes qui sont en situation = 2
       et */
    $sql = "SELECT
            *

			FROM cavevin

			WHERE
            user_id = $user_id

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
    $tab = selectNote($db,$_POST['user_id']);
    echo json_encode($tab);
}