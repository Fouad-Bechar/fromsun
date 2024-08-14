<?php

require_once __DIR__ . '/t/t1.php';

$decryptpsw = openssl_decrypt($encryptpsw, "AES-256-CBC", $key1, 0, $iv1);
$decryptnm = openssl_decrypt($encryptnm, "AES-256-CBC", $key2, 0, $iv2);

try {
    $bdd = new PDO("#; dbname=#; charset=utf8", $decryptnm, $decryptpsw);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
