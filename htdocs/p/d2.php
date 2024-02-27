<?php
session_start();
require_once 'f.php';
if (!isset($_SESSION['user'])) {
    header('Location:i');
    die();
}
$req = $bdd->prepare('DELETE FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
header('Location: ../index');
die();
