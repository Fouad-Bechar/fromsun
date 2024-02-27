<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="s/s1.css" />
    <link rel="icon" href="m/favicon.ico" />
    <title>User account</title>
</head>

<body class="body1">
    <center>
        <div style="margin-top: 20%">
            <?php
            if (isset($_GET['err'])) {
                $err = htmlspecialchars($_GET['err']);
                switch ($err) {
                    case 'size':
                        echo "<div class='test00'>" . "<center>" . "The file size is more than 5 Mo" . "</center>" . "</div>";
                        break;
                    case 'type':
                        echo "<div class='test00'>" . "<center>" . "The file type is not accepted" . "</center>" . "</div>";
                        break;
                }
            }
            header("Refresh: 3; url=g");
            die();
            ?>
        </div>
    </center>
</body>

</html>