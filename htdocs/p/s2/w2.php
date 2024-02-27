<?php
require_once __DIR__ . '/../f.php';
if (!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])) {
    $password = strip_tags($_POST['password']);
    $password = htmlspecialchars($password);
    $password_repeat = strip_tags($_POST['password_repeat']);
    $password_repeat = htmlspecialchars($password_repeat);
    $token = strip_tags($_POST['token']);
    $token = htmlspecialchars($token);
    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $check->execute(array($token));
    $row = $check->rowCount();
    if ($row) {
        if ($password === $password_repeat) {
            if (strlen($password) >= 8) {
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                $update = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE token = ?');
                $update->execute(array($password, $token));
                $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                $delete->execute(array($token));
                $bdd = null;
                header('Location:w1?msg=successfully');
                die();
            } else {
                header('Location:w1?msg=Short');
                die();
            }
        } else {
            header('Location:w1?msg=Password');
            die();
        }
    } else {
        header('Location:w1?msg=Account');
        die();
    }
} else {
    header('Location:w1?msg=enter');
    die();
}
