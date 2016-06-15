<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function deleteNote(PDO $db, $button_delete){

    $sql ="
		DELETE FROM
			fichevin

		WHERE
			id = :button_delete
		";

    $req = $db->prepare($sql);
    $req->execute(array(
        'button_delete' => $button_delete
    ));


}
/** FIN FONCTION **/

/* REQUETE */
if (isset($_POST)){
    $result = deleteNote($db,$_POST['button_delete']);
    echo json_encode($result);
}else{
    echo json_encode(false);
}
