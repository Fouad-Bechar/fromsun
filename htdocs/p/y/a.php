<?php
session_start();
require_once '../f.php';
if (!isset($_SESSION['user'])) {
    header('Location:../i');
    die();
}
if (isset($_POST['save'])) {
    $fileName = $_FILES['file']["name"];
    $fileType = $_FILES['file']["type"];
    $fileSize = $_FILES['file']["size"];
    $fileData = file_get_contents($_FILES['file']["tmp_name"]);
    $file = ($_FILES['file']["tmp_name"]);
    move_uploaded_file($file, "files/" . $fileName);
    $position = "files/" . $fileName;
    if ($fileType === "image/jpeg" || $fileType === "image/png" || $fileType === "image/webp" || $fileType === "image/gif") {
        if ($fileSize / 1024 / 1024 < 5) {
            $update = $bdd->prepare('UPDATE utilisateurs SET file = :file, fileName = :fileName, fileType = :fileType, position = :position  WHERE token = :token');
            $update->bindParam('file', $file);
            $update->bindParam('fileName', $fileName);
            $update->bindParam('fileType', $fileType);
            $update->bindParam('position', $position);
            $update->bindParam('token', $_SESSION['user']);
            $update->execute();
        } else {
            header('Location: ../g1?err=size');
            die();
        }
    } else {
        header('Location: ../g1?err=type');
        die();
    }
    $bdd = null;
    header('Location: ../g');
    die();
} else {
    header('Location: ../g');
    die();
}
