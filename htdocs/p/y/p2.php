<?php
session_start();
require_once '../f.php';
if (!isset($_SESSION['user'])) {
    header('Location:../i');
    die();
}
if (!empty($_POST['new_name']) && !empty($_POST['new_email']) && !empty($_POST['current_password'])) {
    $new_name = strip_tags($_POST['new_name']);
    $new_name = htmlspecialchars($new_name);
    $new_email = strip_tags($_POST['new_email']);
    $new_email = htmlspecialchars($new_email);
    $current_password = strip_tags($_POST['current_password']);
    $current_password = htmlspecialchars($current_password);
    $check  = $bdd->prepare('SELECT password, email, full_name FROM utilisateurs WHERE token = :token');
    $check->bindParam('token', $_SESSION['user']);
    $check->execute();
    $data = $check->fetch();
    if (password_verify($current_password, $data['password'])) {
        if ($new_name != $data['full_name']) {
            if ($new_email != $data['email']) {
                $update = $bdd->prepare('UPDATE utilisateurs SET  full_name = :full_name, email = :email WHERE token = :token');
                $update->bindParam('full_name', $new_name);
                $update->bindParam('email', $new_email);
                $update->bindParam('token', $_SESSION['user']);
                $update->execute();
                $bdd = null;
                header('Location: ../e?msg=suc');
                die();
            } else {
                header('Location: ../e?msg=ema');
                die();
            }
        } else {
            header('Location: ../e?msg=nam');
            die();
        }
    } else {
        header('Location: ../e?msg=pas');
        die();
    }
} else if (!empty($_POST['new_name']) && !empty($_POST['current_password']) && empty($_POST['new_email'])) {
    $new_name = strip_tags($_POST['new_name']);
    $new_name = htmlspecialchars($new_name);
    $current_password = strip_tags($_POST['current_password']);
    $current_password = htmlspecialchars($current_password);
    $check  = $bdd->prepare('SELECT password, full_name FROM utilisateurs WHERE token = :token');
    $check->bindParam('token', $_SESSION['user']);
    $check->execute();
    $data = $check->fetch();
    if (password_verify($current_password, $data['password'])) {
        if ($new_name != $data['full_name']) {
            $update = $bdd->prepare('UPDATE utilisateurs SET  full_name = :full_name WHERE token = :token');
            $update->bindParam('full_name', $new_name);
            $update->bindParam('token', $_SESSION['user']);
            $update->execute();
            $bdd = null;
            header('Location: ../e?msg=suc');
            die();
        } else {
            header('Location: ../e?msg=nam');
            die();
        }
    } else {
        header('Location: ../e?msg=pas');
        die();
    }
} else if (!empty($_POST['new_email']) && !empty($_POST['current_password']) && empty($_POST['new_name'])) {
    $new_email = strip_tags($_POST['new_email']);
    $new_email = htmlspecialchars($new_email);
    $current_password = strip_tags($_POST['current_password']);
    $current_password = htmlspecialchars($current_password);
    $check  = $bdd->prepare('SELECT password, email FROM utilisateurs WHERE token = :token');
    $check->bindParam('token', $_SESSION['user']);
    $check->execute();
    $data = $check->fetch();
    if (password_verify($current_password, $data['password'])) {
        if ($new_email != $data['email']) {
            $update = $bdd->prepare('UPDATE utilisateurs SET email = :email WHERE token = :token');
            $update->bindParam('email', $new_email);
            $update->bindParam('token', $_SESSION['user']);
            $update->execute();
            $bdd = null;
            header('Location: ../e?msg=suc');
            die();
        } else {
            header('Location: ../e?msg=ema');
            die();
        }
    } else {
        header('Location: ../e?msg=pas');
        die();
    }
} else if (empty($_POST['email']) && empty($_POST['full_name']) && !empty($_POST['current_password'])) {
    header('Location: ../e?msg=emp');
    die();
} else {
    header('Location: ../g');
    die();
}
