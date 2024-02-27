<?php
$psw = "#";
$nm = "#";
$ml = "#";
$key1 = $key2 = $key3 = "fouad";
$iv1 = $iv2 = $iv3 = "1234567812345678";
$encryptpsw = openssl_encrypt($psw, "AES-256-CBC", $key1, 0, $iv1);
$encryptnm = openssl_encrypt($nm, "AES-256-CBC", $key2, 0, $iv2);
$encryptml = openssl_encrypt($ml, "AES-256-CBC", $key3, 0, $iv3);
