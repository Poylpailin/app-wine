<?php include('config/config.php'); ?>

<?php

/** FONCTION **/
function userRegistration(PDO $db, $username, $email, $password){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "
		INSERT INTO
            user

        SET
            username = :username,
            email = :email,
            password = :password
    ";

    $req = $db->prepare($sql);
    $result = $req->execute(array(
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ));


    return $result;
}
/** FIN FONCTION **/

/* REQUETE */
if(isset($_POST) && !empty($_POST)){
    $result = userRegistration($db,$_POST['username'],$_POST['email'],$_POST['password']);
    echo json_encode($result);
}else{
    echo json_encode(false);
}