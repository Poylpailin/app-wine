<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function addNote(PDO $db, $nom, $domaine, $annee, $vintype, $commentaire, $quantite, $user_id, $user_username, $image){
    $nom = $_POST['nom'];
    $domaine = $_POST['domaine'];
    $annee = $_POST['annee'];
    $vintype = $_POST['vintype'];
    $commentaire = $_POST['commentaire'];
    $quantite = $_POST['quantite'];

    $user_id = $_POST['$user_id'];
    $user_username = $_POST['$user_username'];
    $image = $_POST['image'];

    $sql = "
		INSERT INTO
            cavevin

        SET
            nom = :nom,
            domaine = :domaine,
            annee = :annee,
            vintype = :vintype,
            commentaire = :commentaire,
            quantite = :quantite,

            user_id = :user_id,
            user_username = :user_username,
            image = :image
    ";

    $req = $db->prepare($sql);
    $result = $req->execute(array(
        'nom' => $_POST['nom'],
        'domaine'=> $_POST['domaine'],
        'annee' => $_POST['annee'],
        'vintype' => $_POST['vintype'],
        'commentaire' => $_POST['commentaire'],
        'quantite' => $_POST['quantite'],
        'user_id' => $_POST['user_id'],
        'user_username' => $_POST['user_username'],
        'image' => $_POST['image']
    ));


    return $result;
}
/** FIN FONCTION **/

/* REQUETE */
if(empty($_POST)){
    echo "Aucune donnée reçue";
}else{
    $result = addNote($db,$_POST['nom'],$_POST['domaine'], $_POST['annee'],$_POST['vintype'], $_POST['commentaire'], $_POST['quantite'], $_POST['user_id'], $_POST['user_username'], $_POST['image']);
    echo json_encode($result);
}