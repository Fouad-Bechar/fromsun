<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s/s2.css" />
    <link rel="icon" href="m/favicon.ico" />
    <title>Contact</title>
</head>

<body>
    <div class="p1">
        <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('../index')">
    </div>
    <center>
        <?php
        if (isset($_GET['err'])) {
            $err = htmlspecialchars($_GET['err']);
            switch ($err) {
                case 'size':
        ?>
                    <div class="msgerr">
                        <h1> The file size is more than 5 Mo </h1>
                    </div>

                <?php
                    break;
                case 'type':
                ?>
                    <div class="msgerr">
                        <h1> The file type is not accepted </h1>
                    </div>
        <?php
                    break;
            }
        }
        ?>


    </center>

    <script>
        function myFunction1(url) {
            window.open(url, "_blank");
        }

        function myFunction2(url) {
            window.open(url, "_parent");
        }
    </script>

</body>

</html>