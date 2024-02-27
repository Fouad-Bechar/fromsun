<?php
session_start();
require_once 'f.php';
$email = $password = "";
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = strip_tags($_POST['email']);
    $email = htmlspecialchars($email);
    $password = strip_tags($_POST['password']);
    $password = htmlspecialchars($password);
    $email = strtolower($email);
    $check = $bdd->prepare('SELECT full_name, email, password, token FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    if ($row > 0) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $data['token'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $password;
                if (isset($_POST['rememberMe'])) {
                    setcookie('emailid', $_SESSION['email'], time() + 60 * 60);
                    setcookie('passwordid', $_SESSION['password'], time() + 60 * 60);
                } else {
                    setcookie('emailid', $_SESSION['email'], time() - 10);
                    setcookie('passwordid', $_SESSION['password'], time() - 10);
                }
                $bdd = null;
                header('Location: g');
                die();
            } else {
                header('Location: i?err=password');
                die();
            }
        } else {
            header('Location: i?err=email');
            die();
        }
    } else {
        header('Location: i?err=already');
        die();
    }
} else {
    header('Location: i');
    die();
}
