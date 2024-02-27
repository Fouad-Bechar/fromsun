<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="../m/favicon.ico" />
    <title>Password Reset</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../f.php';
    if (isset($_GET['token']) &&  isset($_GET['u']) && !empty($_GET['u']) && !empty($_GET['token'])) {
        $u = htmlspecialchars(base64_decode($_GET['u']));
        $token = htmlspecialchars(base64_decode($_GET['token']));
        $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ? AND token = ?');
        $check->execute(array($u, $token));
        $row = $check->rowCount();
        $data = $check->fetch();
        if ($row) {
            $get = $bdd->prepare('SELECT token FROM utilisateurs WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();
            if (hash_equals($data_u['token'], $u)) {
                header('Location: w1?u=' . base64_encode($u));
                die();
                $bdd = null;
            } else {
                echo "<body style='background-color: coral'>" . "<center>" . "<h1 style='color:black; margin-top: 100px'>" . "Error: invalid token" . "</h1>" . "</center>" . "</body>";
                $bdd = null;
            }
        } else {
            echo "<body style='background-color: coral'>" . "<center>" . "<h1 style='color:black; margin-top: 100px'>" . "Error: The link is no longer valid" . "</h1>" . "</center>" . "</body>";
            $bdd = null;
        }
    } else {
        echo "<body style='background-color: coral'>" . "<center>" . "<h1 style='color:black; margin-top: 100px'>" . "Invalid link" . "</h1>" . "</center>" . "</body>";
        $bdd = null;
    }
    ?>
</body>

</html>