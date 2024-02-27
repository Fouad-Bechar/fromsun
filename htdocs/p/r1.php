<?php
session_start();
require_once 'f.php';
$full_name = $email = $password = $password_retype = "";
if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $full_name = strip_tags($_POST['full_name']);
    $full_name = htmlspecialchars($full_name);
    $email = strip_tags($_POST['email']);
    $email = htmlspecialchars($email);
    $password = strip_tags($_POST['password']);
    $password = htmlspecialchars($password);
    $token = bin2hex(openssl_random_pseudo_bytes(64));
    $check = $bdd->prepare('SELECT full_name, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    $email = strtolower($email);
    if ($row == 0) {
        if (strlen($full_name) <= 100) {
            if (strlen($email) <= 100) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $insert = $bdd->prepare('INSERT INTO utilisateurs(full_name, email, password, ip, token) VALUES(:full_name , :email , :password , :ip , :token)');
                    $insert->bindParam('full_name', $full_name);
                    $insert->bindParam('email', $email);
                    $insert->bindParam('password', $password);
                    $insert->bindParam('ip', $ip);
                    $insert->bindParam('token', $token);
                    $insert->execute();
                    $_SESSION['user'] = $token;
                    $bdd = null;
                    header('Location: g');
                    die();
                } else {
                    header('Location: r?err=email');
                    die();
                }
            } else {
                header('Location: r?err=email_length');
                die();
            }
        } else {
            header('Location: r?err=pseudo_length');
            die();
        }
    } else {
        header('Location: r?err=already');
        die();
    }
}
