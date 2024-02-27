<?php
require_once __DIR__ . '/../f.php';
if (!empty($_GET['u'])) {
  $token = htmlspecialchars(base64_decode($_GET['u']));
  $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ?');
  $check->execute(array($token));
  $row = $check->rowCount();
  if ($row == 0) {
    echo "Lien non valide";
    die();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <meta name="author" content="Fouad" />
  <link rel="stylesheet" href="../s/s4.css" />
  <link rel="stylesheet" href="../s/s1.css" />
  <link rel="icon" href="../m/favicon.ico" />
  <title>Password Reset</title>
</head>

<body class="body83">
  <center>
    <div class="p1">
      <img class="img02" src="../m/home.webp" alt="image" onclick="myFunction2('../../index')">
    </div>
  </center>
  <center>
    <div>
      <?php
      if (isset($_GET['msg'])) {
        $err = htmlspecialchars($_GET['msg']);
        switch ($err) {
          case 'successfully':
      ?>
            <div style="width: 380px; color:#ffffff; text-align: center;  background:green; border-radius: 15px; box-shadow: 0px 15px 20px rgba(0,0,0,0.1)">
              <strong> The password has been changed successfully </strong>
              <?php
              header('Refresh: 3; URL= ../i');
              die();
              ?>
            </div>
          <?php
            break;
          case 'Password':
          ?>
            <div style="width: 380px; color:#ffffff; text-align: center;  background:red; border-radius: 15px; box-shadow: 0px 15px 20px rgba(0,0,0,0.1)">
              <strong> passwords are not the same </strong>
              <?php header("Refresh: 3;" . "URL=" . $_SERVER['HTTP_REFERER']);
              die();
              ?>
            </div>
          <?php
            break;
          case 'Short':
          ?>
            <div style="width: 380px; color:#ffffff; text-align: center;  background:red; border-radius: 15px; box-shadow: 0px 15px 20px rgba(0,0,0,0.1)">
              <strong> password is less than 8 characters </strong>
              <?php header("Refresh: 3;" . "URL=" . $_SERVER['HTTP_REFERER']);
              die();
              ?>
            </div>
          <?php
            break;
          case 'Account':
          ?>
            <div style="width: 380px; color:#ffffff; text-align: center;  background:red; border-radius: 15px; box-shadow: 0px 15px 20px rgba(0,0,0,0.1)">
              <strong> account does not exist </strong>
              <?php header("Refresh: 3;" . "URL=" . $_SERVER['HTTP_REFERER']);
              die();
              ?>
            </div>
          <?php
            break;
          case 'enter':
          ?>
            <div style="width: 380px; color:#ffffff; text-align: center;  background:red; border-radius: 15px; box-shadow: 0px 15px 20px rgba(0,0,0,0.1)">
              <strong> please enter a password </strong>
              <?php header("Refresh: 3;" . "URL=" . $_SERVER['HTTP_REFERER']);
              die();
              ?>
            </div>
      <?php
            break;
        }
      }
      ?>
    </div>
    <div class="wrapper002">
      <div class="classs222">
        <div class="classs22">
          <img class="classs223" src="../m/closs1.webp" onclick="myFunction2('../i')" alt="image444" />
        </div>
        <div class="title1">
          <span> Enter a new password </span>
        </div>
      </div>
      <form class="frm1" action="w2" method="POST">

        <div class="field">
          <input id="psw" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
          <label>Password</label>
        </div>

        <div class="field">
          <input type="password" name="password_repeat" placeholder="retype password" required>
          <label>Retype password</label>
        </div>
        <div class="field">
          <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>">
          <label></label>
        </div>


        <div id="message">
          <b class="b0b">Password must contain the following:</b>
          <br/>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <br/>
          <p id="capital" class="invalid">A <b>capital</b> letter</p>
          <br/>
          <p id="number" class="invalid">A <b>number</b></p>
          <br/>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>

        <div class="field">
          <input type="submit" value="Save">

        </div>

      </form>
    </div>
  </center>
  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function() {

      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>

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