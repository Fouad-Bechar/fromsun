<?php
session_start();
$prenom = $_SESSION['prenom1'];
$nom = $_SESSION['nom1'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="s/s2.css" />
    <link rel="icon" href="m/favicon.ico" />
    <title>Contact</title>
</head>

<body>
    <div class="p1">
        <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('../index')">
    </div>
    <?php
    echo "<div class=p2>" . "<h1 class=hh1>" . $prenom . "&nbsp" . $nom . "</h1>" . "<h2 class=hhh2>" . "<p id=demoo>" . "</p>" . "<p id=demoo1>" . "</p>" . "</h2>" . "</div>";
    ?>
    <script>
        function myFunction1(url) {
            window.open(url, "_blank");
        }

        function myFunction2(url) {
            window.open(url, "_parent");
        }
    </script>
    <script>
        var text = "We thank you for contacting us and we will answer you as soon as possible.";
        var text1 = "Thank you.";
        var i = 0;
        var j = 0;
        setTimeout(function typeWriter() {
            if (i < text.length) {
                document.getElementById("demoo").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            } else if (j < text1.length) {
                document.getElementById("demoo1").innerHTML += text1.charAt(j);
                j++;
                setTimeout(typeWriter, 100);
            } else {
                i = 0;
                j = 0;
            }
        }, 1000);
    </script>
</body>

</html>