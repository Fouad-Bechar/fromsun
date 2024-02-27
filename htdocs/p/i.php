<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Fouad" />
   <link rel="stylesheet" href="s/s1.css" />
   <link rel="icon" href="m/favicon.ico" />
   <title>Login</title>
</head>

<body class="body83">
   <center>
      <div class="p1">
         <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('../index')">
      </div>
      <center>
         <div>
       
         </div>
         <div class="wrapper00">
            <div class="classs222">
               <div class="classs22">
                  <img class="classs223" src="m/closs1.webp" onclick="myFunction2('../index')" alt="image444" />
               </div>
           
           

               <div class="title">

                  <img src="m/image444.webp" alt="image444" />
               </div>
       
            </div>
            <form class="frm1" action="c" method="post">
           <?php
            if (isset($_GET['err'])) {
               $err = htmlspecialchars($_GET['err']);
               switch ($err) {
                  case 'password':
            ?>
                     <div class="div89">
                        <b> Incorrect password </b>
                     </div>
                  <?php
                     break;
                  case 'email':
                  ?>
                     <div class="div89">
                        <b> Incorrect email </b>
                     </div>
                  <?php
                     break;
                  case 'already':
                  ?>
                     <div class="div89">
                        <b> Account not found </b>
                     </div>
            <?php
                     break;
               }
            }
            ?>

               <div class="field">
                  <input type="email" name="email" placeholder="Email Address" required value="<?php
                                                                                                if (isset($_COOKIE['emailid'])) {
                                                                                                   echo $_COOKIE['emailid'];
                                                                                                } ?>">
            <label>Email Address</label>
               </div>
               <div class="field">
                  <input type="password" name="password" placeholder="Password" required value="<?php
                                                                                                if (isset($_COOKIE['passwordid'])) {
                                                                                                   echo $_COOKIE['passwordid'];
                                                                                                } ?>">
                  <label>Password</label>
               </div>
               <div class="content">
                  <div class="checkbox">
                     <input type="checkbox" id="remember-me">
                     <label for="remember-me">Remember me</label>
                  </div>
                  <div class="pass-link">
                     <a href="i2">Forgot password?</a>
                  </div>
               </div>
               <div class="field">
                  <input type="submit" value="Login">
               </div>
               <div class="signup-link">
                  Not a member? <a href="r">Signup now</a>
               </div>
            </form>
         </div>
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