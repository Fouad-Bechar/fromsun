<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../l/autoload.php';
require_once __DIR__ . '/../f.php';
require_once __DIR__ . '/../t/t1.php';
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = strip_tags($_POST['email']);
    $email = htmlspecialchars($email);
    $check = $bdd->prepare('SELECT token FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    if ($row) {
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token'];
        $insert = $bdd->prepare('INSERT INTO password_recover (token_user, token) VALUES(?,?)');
        $insert->execute(array($token_user, $token));
        if ($row) {
            $decryptml = openssl_decrypt($encryptml, "AES-256-CBC", $key3, 0, $iv3);
            $link = "<a href=" . '#' . base64_encode($token_user) . '&token=' . base64_encode($token) . " >" . " Click on the link to reset your password." . "</a>";
            $subj = '#';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '#';
            $mail->Password = $decryptml;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->setFrom('#', '#');
            $mail->addAddress($email);
            $mail->Subject = $subj;
            $mail->Body = $link;
            $mail->send();
        }
        $bdd = null;
        header('Location: ../i2?err=link');
        die();
    } else {
        header('Location: ../i2?err=email');
        die();
    }
}
