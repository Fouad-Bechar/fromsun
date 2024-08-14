<?php
session_start();
require_once 'f.php';
if (!isset($_SESSION['user'])) {
  header('Location:i');
  die();
}
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Fouad" />
  <link rel="stylesheet" href="s/s1.css" />
  <link rel="icon" href="m/favicon.ico" />
  <title>Change profile</title>
</head>

<body class="body83">

  <div class="p1">
    <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('g')">
  </div>
  <center>
    <div>
      <?php
      if (isset($_GET['msg'])) {
        $err = htmlspecialchars($_GET['msg']);
        switch ($err) {
          case 'pas':
            echo "<div class='test00'>" . "<center>" . "The current password is incorrect" . "</center>" . "</div>";
            break;
          case 'ema':
            echo "<div class='test00'>" . "<center>" . "Email is used" . "</center>" . "</div>";
            break;
          case 'nam':
            echo "<div class='test00'>" . "<center>" . "Full Name is used" . "</center>" . "</div>";
            break;
          case 'emp':
            echo "<div class='test00'>" . "<center>" . "Choose one to change" . "</center>" . "</div>";
            break;
          case 'suc':
            echo "<div class='test01'>" . "<center>" . "Profile changed successfully !" . "</center>" . "</div>";
            header("Refresh: 3;" . "URL=" . "g");
            die();
            break;
        }
      }
      ?>
    </div>
    <div>
      <?php
      if (isset($_GET['msg'])) {
        $err = htmlspecialchars($_GET['msg']);
        switch ($err) {
          case 'err':
            echo "<div class='test00'>" . "<center>" . "The current password is incorrect" . "</center>" . "</div>";
            break;
          case 'suc':
            echo "<div class='test01'>" . "<center>" . "The password has been changed successfully" . "</center>" . "</div>";
            header("Refresh: 3;" . "URL=" . "g");
            die();
            break;
        }
      }
      ?>
    </div>
  </center>
  <center>
    <div class="wrapper00">

        <div class="classs222">
               <div class="classs22">
                  <img class="classs223" src="m/closs1.webp" onclick="myFunction2('g')" alt="image444" />
               </div>

      <div class="title">
     <!--<div style="margin-left:auto; margin-right: auto; display: block;"> <img  src="m/webp1.webp" alt="image01"/> </div>-->
      <span style="font-weight: bold; font-size: 25px; text-align: center; line-height: 80px; color: gold; user-select: none">Change Profile</span>
      </div> </div>
      <form class="frm1" action="y/p2" method="POST">
        <div class="field">
          <input type="text" name="new_name" placeholder="Enter new full name">
          <label> New Full Name </label>
        </div>
        <div class="field">
          <input type="email" name="new_email" placeholder="Enter New email">
          <label> New email </label>
        </div>
        <div class="field">
          <input type="password" name="current_password" placeholder="Password" required>
          <label> Password </label>
        </div>
        <div class="content">

          <div class="pass-link">
            <a href="i2"> Forgot password? </a>
          </div>
        </div>

        <div class="field">
          <input type="submit" value="Save">
        </div>
      </form>
    </div>
  </center>
<center>
<div class="wrapper008">
      <div class="classs222">
               <div class="classs22">
                  <img class="classs223" src="m/closs1.webp" onclick="myFunction2('g')" alt="image444" />
               </div>
      <div class="title">

        <span style="font-weight: bold"> Change Password </span>
      </div> </div>
      <form class="frm1" action="y/p1" method="POST">
        <div class="field">
          <input type="password" name="current_password" placeholder="Current Password" required>
          <label>Current Password</label>
        </div>
        <div class="field">
          <input id="psw" type="password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New password" required>
          <label>New Password</label>
        </div>


        <div id="message">
          <b class="b0b">Password must contain the following:</b>
          <p id="letter" class="invalid">A<b>lowercase </b>letter</p>
          <p id="capital" class="invalid">A <b>capital</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <div class="field">
          <input type="submit" value="Save">
        </div>
      </form>
    </div>
  </center>
  <center>
    <div class="wrapper000">
      <a href="" id="d01" onclick="myFunction001()" style="color: #fff;">Delete profile</a>
    </div>
  </center>
  <!--
<footer class="foter"> <center> 
<img class="img321" src="images/image0104.webp" width="30px" height="30px" alt="image0102" onclick="myFunction1('https://www.facebook.com/worldwildlifefund')"/>
<img style="cursor: pointer; border-radius: 50%" src="images/image0105.webp" width="30px" height="30px" alt="image0105" onclick="myFunction1('https://twitter.com/world_wildlife')"/> </center> </footer> -->

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
    function myFunction001() {
      var text = "Are you sure to delete your account !";
      var delt = document.getElementById("d01");
      if (confirm(text) == true) {
        delt.href = "d2";
      } else {
        delt.href = "";
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