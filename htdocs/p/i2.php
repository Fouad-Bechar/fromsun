<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="robots" content="noindex, nofollow">
   <meta name="author" content="Fouad" />
   <link rel="stylesheet" href="s/s4.css" />
   <link rel="stylesheet" href="s/s1.css" />
   <link rel="icon" href="m/favicon.ico" />
   <title>Password Reset</title>
</head>

<body class="body83">
   <center>
      <div class="p1">
         <img class="img02" src="m/home.webp" alt="image" onclick="myFunction2('../index')">
      </div>
      <center>
         <div>
        </div>
         <div class="wrapper001">
            <div class="classs222">
               <div class="classs22">
                  <img class="classs223" src="m/closs1.webp" onclick="myFunction2('i')" alt="image444" />
               </div>

               <div class="title1">
                  <span> Please enter your email </span>
               </div>
            </div>

            <form class="frm1" action="s2/f1" method="POST">
               <div class="field">
                  <input type="email" name="email" placeholder="Email" required>
                  <label>Email</label>
               </div>

               <div class="content">
           

               <?php
            if (isset($_GET['err'])) {
               $err = htmlspecialchars($_GET['err']);
               switch ($err) {
                  case 'link':
            ?>
                     <div class="div90">
                        <strong> We have sent a password reset link to your email </strong>
                     </div>
                  <?php
                     break;
                  case 'email':
                  ?>
                     <div class="div89">
                        <strong> Incorrect email </strong>
                     </div>
            <?php
                     break;
               }
            }
            ?>

               </div>
               <div class="field">
                  <input type="submit" value="Send">

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