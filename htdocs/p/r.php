<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Fouad" />
  <link rel="stylesheet" href="s/s1.css" />
  <link rel="icon" href="m/favicon.ico" />
  <title>Registration</title>
</head>

<body class="body83">
  <center>
    <div class="p1">
      <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('../index')">
    </div>
    <center>

      <div class="wrapper00">
        <div class="classs222">
          <div class="classs22">
            <img class="classs223" src="m/closs1.webp" onclick="myFunction2('../index')" alt="image444" />
          </div>
          <div class="title">
            <img src="m/image88.webp" alt="image88" />
          </div>
        </div>
        <form class="frm1" action="r1" method="post">

               <?php
        if (isset($_GET['err'])) {
          $err = htmlspecialchars($_GET['err']);
          switch ($err) {
            case 'already':
        ?>
              <div class="div89">
                <b> Existing account </b>
              </div>
            <?php
              break;
            case 'email':
            ?>
              <div class="div89">
                <b> invalid email </b>
              </div>
            <?php
              break;
            case 'email_length':
            ?>
              <div class="div89">
                <b> Email too long </b>
              </div>
            <?php
            case 'pseudo_length':
            ?>
              <div class="div89">
                <b> Username too long </b>
              </div>
        <?php
          }
        }
        ?>

          <div class="field">
            <input type="text" name="full_name" placeholder="Full name" required>
            <label>Full name</label>
          </div>
          <div class="field">
            <input type="email" name="email" placeholder="Email Address" required>
            <label>Email Address</label>
          </div>
          <div class="field">
            <input id="psw" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
            <label>Password</label>
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
            <br/>
          </div>
          <div class="field">
            <input type="submit" value="Register">
          </div>
          <div class="signup-link">
            you have an account? <a href="i">Login now</a>
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