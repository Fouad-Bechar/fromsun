<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'l/autoload.php';

require_once __DIR__ . '/t/t1.php';

$prenom01 = $nom01 = $sexe01 = $daten01 = $email01 = $tel01 = $adresse01 = $textarea01 = $fileName = $fileType = $fileData = $file = $fileSize = $position = $addData = $ip = $info = "";
$ip = $_SERVER["REMOTE_ADDR"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "#" . $ip);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$info = curl_exec($ch);
curl_close($ch);
$mesg = '#';
$decryptpsw = openssl_decrypt($encryptpsw, "AES-256-CBC", $key1, 0, $iv1);
$decryptnm = openssl_decrypt($encryptnm, "AES-256-CBC", $key2, 0, $iv2);
$decryptml = openssl_decrypt($encryptml, "AES-256-CBC", $key3, 0, $iv3);
$subj = '#';
$username = $decryptnm;
$pasword = $decryptpsw;
$database = new PDO("#; dbname=#; charset=utf8;", $username, $pasword);

if (isset($_POST['button'])) {
  $prenom01 = $_POST["prenom"];
  $prenom1 = strip_tags($prenom01);
  $nom01 = $_POST["nom"];
  $nom1 = strip_tags($nom01);
  $sexe01 = $_POST["sexe"];
  $sexe1 = strip_tags($sexe01);
  $daten01 = $_POST["daten"];
  $daten1 = strip_tags($daten01);
  $email01 = $_POST["email"];
  $email1 = strip_tags($email01);
  $tel01 = $_POST["tel"];
  $tel1 = strip_tags($tel01);
  $adresse01 = $_POST["adresse"];
  $adresse1 = strip_tags($adresse01);
  $textarea01 = $_POST['textarea'];
  $textarea1 = strip_tags($textarea01);
  $fileName = $_FILES['file']["name"];
  $fileType = $_FILES['file']["type"];
  $fileSize = $_FILES['file']["size"];
  $file = ($_FILES['file']["tmp_name"]);
  move_uploaded_file($file, "y/files/" . $fileName);
  $position = "y/files/" . $fileName;
  $_SESSION['prenom1'] = $prenom1;
  $_SESSION['nom1'] = $nom1;
  if ($fileType === "image/jpeg" || $fileType === "image/png" || $fileType === "image/webp" || $fileType === "image/gif" || $fileType === "") {
    if ($fileSize / 1024 / 1024 < 5 || $fileSize === "") {
      $addData = $database->prepare("INSERT INTO tab1contact (prenom,nom,sexe,daten,email,tel,adresse,textarea,file,fileName,fileType,fileSize,position,info) 
VALUES(:prenom , :nom , :sexe , :daten , :email , :tel , :adresse , :textarea, :file , :fileName , :fileType , :fileSize , :position , :info)");
      $addData->bindParam("prenom", $prenom1);
      $addData->bindParam("nom", $nom1);
      $addData->bindParam("sexe", $sexe1);
      $addData->bindParam("daten", $daten1);
      $addData->bindParam("email", $email1);
      $addData->bindParam("tel", $tel1);
      $addData->bindParam("adresse", $adresse1);
      $addData->bindParam("textarea", $textarea1);
      $addData->bindParam("file", $fileData);
      $addData->bindParam("fileName", $fileName);
      $addData->bindParam("fileType", $fileType);
      $addData->bindParam("fileSize", $fileSize);
      $addData->bindParam("position", $position);
      $addData->bindParam("info", $info);
      if ($addData->execute()) {
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
        $mail->addAddress($email1);
        $mail->Subject = $subj;
        $mail->Body = $mesg;
        $mail->send();
        $database = null;
        header('Location: p03');
        die();
      } else {
        $database = null;
      }
    } else {
      header('Location: p01?err=size');
      die();
    }
  } else {
    header('Location: p01?err=type');
    die();
  }
}
