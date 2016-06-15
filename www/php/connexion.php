<?php include('config/config.php'); ?>

<?php

/** FONCTION CONNEXION **/
/** FUNCTION.PHP **/
function userConnection(PDO $db, $username, $password){

    $sql = "
				SELECT
				*

				FROM
				user

				WHERE
				username = :username AND password = :password

				";

    $req = $db->prepare($sql);
    $req->execute(array(
        'username' => $username,
        'password' => $password
    ));

    $result = $req->fetch(PDO::FETCH_ASSOC);

    return $result;

}
/** FIN FONCTION CONNEXION **/

if (isset($_POST['username']) && isset($_POST['password'])){

    $result = userConnection($db, $_POST['username'], $_POST['password']);
    echo json_encode($result);

    if ($result !== false)
    {
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];

    }else{
        echo 'Mauvais identifiant ou mot de passe !';
    }

}else{
    'Le username et/ou le mot de passe est incorrect';
}
