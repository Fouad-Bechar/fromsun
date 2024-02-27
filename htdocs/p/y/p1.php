<?php
session_start();
require_once '../f.php';
if (!isset($_SESSION['user'])) {
    header('Location:../i');
    die();
}
if (!empty($_POST['current_password']) && !empty($_POST['new_password'])) {
    $current_password = strip_tags($_POST['current_password']);
    $current_password = htmlspecialchars($current_password);
    $new_password = strip_tags($_POST['new_password']);
    $new_password = htmlspecialchars($new_password);
    $check_password  = $bdd->prepare('SELECT password FROM utilisateurs WHERE token = :token');
    $check_password->bindParam('token', $_SESSION['user']);
    $check_password->execute();
    $data_password = $check_password->fetch();
    if (password_verify($current_password, $data_password['password'])) {
        $cost = ['cost' => 12];
        $new_password = password_hash($new_password, PASSWORD_BCRYPT, $cost);
        $update = $bdd->prepare('UPDATE utilisateurs SET password = :password WHERE token = :token');
        $update->bindParam('password', $new_password);
        $update->bindParam('token', $_SESSION['user']);
        $update->execute();
        $bdd = null;
        header('Location: ../e?msg=suc');
        die();
    } else {
        header('Location: ../e?msg=err');
        die();
    }
} else {
    header('Location: ../g');
    die();
}
