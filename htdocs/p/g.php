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
 
<nav>
  <div class="menu">
    <div class="container">
      <ul class="inner-menu">
        <li><a href="#">Organizations</a>
          <ul class="dropdown">
            <li><a href="https://www.iucn.org/" target="_blank"> Union for Conservation of Nature </a> </li>
            <li><a href="https://www.worldwildlife.org/" target="_blank"> World Wide Fund </a> </li>
          </ul>
        </li>
       
         <li><a href="#">Culture</a>
          <ul class="dropdown">
            <li><a href="https://techcrunch.com" target="_blank">General</a></li>
            <li><a href="https://binothaimeen.net/site" target="_blank">Islamic</a></li>
            
          </ul>
        </li>
        <li><a href="#">Computer</a>
          <ul class="dropdown">
            <li><a href="https://www.virustotal.com/gui/home/upload" target="_blank">Online scan</a></li>
            <li> <a href="https://www.totalav.com/free-antivirus-software-2" target="_blank">Protect PC</a></li>
          </ul>
        </li>
        <li><a href="#">Games</a>
          <ul class="dropdown">
            <li><a href="https://www.combatsiege.com" target="_blank">Combat siege</a></li>
            <li> <a href="https://www.hero-wars.com"  target="_blank">Hero wars</a></li>
          </ul>
        </li>
        
        <li><a href="#">Account</a>
          <ul class="dropdown">
            <li><a  href="#" onclick="document.getElementById('id01').style.display='block'"> Profile </a></li>
            <li><a  href="d1"> Log out </a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <div id="id01" class="modal">


        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close00" title="Close Modal">&times;</span>
        </div>
        <div style="padding: 10px;">
            <p>
                <?php
                $filn = $data['fileName'];
                echo '<a href="#" data-toggle="modal" data-target="#avatar">' . '<img src="' . "y/files/" . $filn . '" width="200px" height="auto"   style="border: 1px solid black; box-shadow: 1px 1px 10px black;"/>' . '</a>' . '<br/>' . '<a href="#" onclick="getid()" style="color:blue">' . 'Edit avatar' . '</a>';
                ?>
            </p>
            <hr class="hrhr1"/>
            <p style="margin-top: 5px;">
                <b style="color:black;">Name:<b />
                    <?php echo "<span style='color:black'>" . '<b>' . $data['full_name'] . '</b>' . "</span>"; ?>
            </p>
            <p style="margin-top: 2px; margin-bottom: 10px">
                <b style="color:black;">Email:<b />
                    <?php echo "<span style='color:black'>" . '<b>' . $data['email'] . '</b>' . "</span>"; ?>
            </p>
            <hr class="hrhr1"/>
            <p style="margin-top: 5px;">
                <a href="e" style="color:blue"> Edit profile </a>
            </p>
        </div>
    </div>

    <div id="id02" style="width: 320px; height: auto; display: none; position: fixed; z-index: 6000; overflow: auto;  padding-top: 10px; left: 50%; transform: translate(-50%, 50%); flex-direction: column; align-items: center; justify-content: space-evenly;  background-color: #1fc8db; background-image: linear-gradient(140deg, #EADEDB 0%, #7082bc 50%, #53aa53 75%); opacity: 0.95; align-self: baseline; outline-color: antiquewhite; outline-style: dotted;">

        <form action="y/a" method="POST" enctype="multipart/form-data">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close00" title="Close Modal">&times;</span>

            </div>
            <center>
                <h2 style="color:black; text-align: center; text-decoration: dotted; margin-top: 20px; margin-bottom: 30px;">Change Avatar</h2>
                <hr />
            </center>

            <div>

                <input type="file" name="file" accept="image/*" required style="color: black;" />
                <b style="color: black;">(< 5Mo)</b>
                        <br />
                        <hr />
                        <button type="submit" class="btn0" name="save" style=" background-color: #04AA6D; margin-top: 20px; width:100px; border-radius: 10px; color: white; cursor: pointer;"> Save </button>
            </div>
        </form>
    </div>
    <div>
        <?php
        $filn = $data['fileName'];
        $nam = $data['full_name'];
        echo '<center>' . '<div class="link3">' . '<h3>' . '<div class="link1">' . '<span style="color:chartreuse">' . ' ' . 'Welcome' . ' ' . '</span>' . '<span style="color:cyan">' . $nam . '</span>' . '<span style="color:gold">' . ' ' . 'to' . ' ' . '</span>' . '<span style="color:fuchsia">' . 'your' . ' ' . '</span>' . '<span style="color:darkorange">' . 'site' . ' ' . '</span>' . '</div>' . '</h3>' . '<br/>' . '<a href="#" onclick="getid()" >' . '<img class="link" src="' . "y/files/" . $filn . '"/>' . '</a>' . '<br/>' . '<div class="link2">' . $nam . '</div>' . '</center>' . '</div>';
        ?> </div>
    <div class="div0121">
        <img class="img257" src="m/image1bn.webp" alt="image" />
        <form class="form" action="https://www.bing.com/search" outocomplete="on" method="get" enctype="application/x-www-form-urlencoded" accept-charset target="_blank">
            <div class="search">
                <input class="inputt" name="q" type="search" placeholder="Search" required />
                <input class="input0114" name="btnG" type="submit" />
            </div>
        </form>
    </div>
    <marquee class="marqu" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="0" scrollamount="5">
        <div>
            <h3 class="b4" onclick="myFunction1('https://enence.com/')"> Muama Enence &ensp;</h3>
            <p class="p1">This Device Turns You Into A Native Speaker Of 36+ Languages In Seconds.</p>
            <h3 class="b5" onclick="myFunction1('https://blackbird4k.com/')"> &ensp; The Black Bird 4K &ensp;</h3>
            <p class="p1"> is a tiny drone with a 4k camera that lets you take breathtaking photos and videos. It's foldable, lightweight and easy to carry.</p>
            <h3 class="b6" onclick="myFunction1('https://www.outlookindia.com/business-spotlight/safe-cam-360-reviews-does-this-light-bulb-security-camera-really-work-must-read-before-you-buy-news-229349')">&ensp; Safe Cam 360 &ensp;</h3>
            <p class="p1"> Always Know What’s Going On At Home, No Matter Where You Are.</p>
        </div>
    </marquee>

    <div class="f113">
        <div class="ff113">
            <h1 class="bb7" onclick="myFunction1('https://www.greenmountainenergy.com/why-renewable-energy/protect-the-environment')">12 ways you can protect the environment </h1><br>
            <img class="iiim" src="m/image4.webp" width="400px" height="224px" alt="image" onclick="myFunction1('https://www.greenmountainenergy.com/why-renewable-energy/protect-the-environment')" />
            <p class="b3">
                Most of the damage to our environment stems from consumption: what
                we consume, how much we consume and how often.
                <br />
                Whether it’s gas, food, clothing, cars, furniture, water, toys,
                electronics, knick-knacks or other goods, we are all consumers.
                The key is not to stop consuming, but to start being mindful of
                our consumption habits and how each purchase or action affects the
                ecosystem. The good news is that it’s often not too difficult,
                expensive, or inconvenient to become more environmentally
                friendly. It can even be a fun challenge to implement among your
                family or coworkers. And though small changes at the individual
                level may seem trivial, just think how much cleaner the planet
                would be If everyone adopts behavior modification.<i style="color:blue; cursor:pointer;" onclick="myFunction1('https://www.greenmountainenergy.com/why-renewable-energy/protect-the-environment')">(continued..)</i>
            </p>
        </div>
    </div>
    <div class="ff1133f" id="divv12" onclick="video()">
        <img class="grid1img" id="im0" onclick="video()" src="m/image1d.webp" width="100px" height="100px" alt="image" />
    </div>
    <div class="exxpp">
        <img src="m/close110.webp" class="exp0c" id="cl" onclick="closse()" width="25px" height="25px" alt="image" />
        <video class="exp" id="vid" src="" preload="auto" controls autoplay> </video>
        <a id="aa001" href="https://www.worldwildlife.org/" target="_blank"> WWF </a>
    </div>

    <div class="f13">
        <div class="ff13">
            <h1 class="bb7" onclick="myFunction1('https://www.aroundrobin.com/importance-of-social-justice/')">The importance of social justice</h1> <br>
            <img class="iim" src="m/image5.webp" alt="image" width="300px" height="192px" onclick="myFunction1('https://www.aroundrobin.com/importance-of-social-justice/')" />
            <p class="b3">
                We are living in an era of contradictions. While we should focus
                on building a unified approach towards fighting a global pandemic,
                we are more divided than ever. We are more connected than ever
                before in human history, yet are unable to understand the plight
                of others. We see an evolution of human rights, but see no end to
                conflict. We are more willing to accept differences, yet
                discrimination is on the rise. We are living in an era where we
                have greater freedoms than ever before, yet we see no end to
                injustice. So where do we go from here? Is there a way to heal the
                world? Social justice may be the answer.<i style="color:blue; cursor:pointer;" onclick="myFunction1('https://www.aroundrobin.com/importance-of-social-justice/')">(continued..)</i>
            </p>
            <h1 class="bb7" onclick="myFunction1('https://www.womenshealth.gov/relationships-and-safety/domestic-violence/effects-domestic-violence-children')">Effects of domestic violence on children</h1><br>
            <img class="iim" src="m/image06.webp" alt="image" width="300px" height="200px" onclick="myFunction1('https://www.womenshealth.gov/relationships-and-safety/domestic-violence/effects-domestic-violence-children')" />
            <p class="b3">
                Many children exposed to violence in the home are also victims of
                physical abuse.One: Children who witness domestic violence or are
                victims of abuse themselves are at serious risk for long-term
                physical and mental health problems.two: Children who witness
                violence between parents may also be at greater risk of being
                violent in their future relationships. If you are a parent who is
                experiencing abuse, it can be difficult to know how to protect
                your child.<i style="color:blue; cursor:pointer;" onclick="myFunction1('https://www.womenshealth.gov/relationships-and-safety/domestic-violence/effects-domestic-violence-children')">(continued..)</i>
            </p>
        </div>
        <div class="ff14">
            <h1 class="bb7" onclick="myFunction1('https://riseservicesinc.org/news/5-stages-child-development/#:~:text=Other%20scholars%20describe%20six%20stages,%2C%20school%20age%2C%20and%20adolescents.')">What are the 5 stages of child development</h1><br>
            <img class="iim" src="m/image7.webp" alt="image" width="300px" height="142px" onclick="myFunction1('https://riseservicesinc.org/news/5-stages-child-development/#:~:text=Other%20scholars%20describe%20six%20stages,%2C%20school%20age%2C%20and%20adolescents.')" />
            <p class="b3">
                Children change rapidly as they grow. Many of these changes are
                physical. Other changes are cognitive, which means the changes
                affect the way children think and learn. Child development often
                occurs in stages, with the majority of children hitting specific
                developmental landmarks by the time they reach a certain age.<i style="color:blue; cursor:pointer;" onclick="myFunction1('https://riseservicesinc.org/news/5-stages-child-development/#:~:text=Other%20scholars%20describe%20six%20stages,%2C%20school%20age%2C%20and%20adolescents.')">(continued..)</i>
            </p>
            <h1 class="bb7" onclick="myFunction1('https://caringforkids.cps.ca/handouts/mentalhealth/mental_health')">Your child’s mental health</h1><br>
            <img class="iim" src="m/image8.webp" alt="image" width="300px" height="200px" onclick="myFunction1('https://caringforkids.cps.ca/handouts/mentalhealth/mental_health')" />
            <p class="b3">
                Mental health affects the way people think, feel and act. Taking
                care of our mental health is just as important as having a healthy
                body. As a parent, you play an important role in your child's
                mental health.
                <br />
                You can promote good mental health by the things you say and do,
                and through the environment you create at home.
                <br />
                You can also learn about the early signs of mental health problems
                and know where to go for help.<i style="color:blue; cursor:pointer;" onclick="myFunction1('https://caringforkids.cps.ca/handouts/mentalhealth/mental_health')">(continued..)</i>
            </p>
        </div>
    </div>
    <center>
        <video class="vid00" controls autoplay muted loop preload="metadata" width="400px" height="auto" onclick="myFunction1('https://www.worldwildlife.org/')">
            <source src="https://res.cloudinary.com/dougpslkv/video/upload/v1708925167/Nature_Is_Speaking.mp4" type="video/mp4">
            <track src="v/captions_fr.vtt" kind="captions" srclang="fr" label="French">
            <track src="v/captions_ar.vtt" kind="captions" srclang="ar" label="Arabic">
        </video>
    </center>
    <footer class="foter">


             <div class="wrapper0001">
          <fieldset>
            <form action="p02" method="POST" enctype="multipart/form-data">
              <table>
                <tbody>
              
                  <tr>
                    <td>
                      <input 
                        type="text"
                        name="prenom"
                        placeholder="First name"
                        required
                      />
                    </td>
                  </tr>
                  
                  <tr>
                    <td>
                      <input 
                        type="text"
                        name="nom"
                        placeholder="Last name"
                        required
                      />
                    </td>
                  </tr>
                  
                  <tr>
                    <td>
                      <select  name="sexe"   placeholder="Last name"  required>
                        <option value="">Select</option>
                        <option value="MASCULIN">Masculine</option>
                        <option value="FEMININ">Feminine</option>
                      </select>
                    </td>
                  </tr>
                  
                  <tr>
                    <td><input id="input" type="Date" name="daten" required /></td>
                  </tr>
               
                  <tr>
                    <td>
                      <input class="input"
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        required
                      />
                    </td>
                  </tr>
                
                  <tr>
                    <td><input  type="tel" name="tel" placeholder="Phone" /></td>
                  </tr>
                
                  <tr>
                    <td>
                      <input  type="text" name="adresse" placeholder="Address" />
                    </td>
                  </tr>
              
                  <tr>
                    <td>
                      <textarea
                        name="textarea"
                        rows="5"
                        cols="30"
                        placeholder="Message"
                      ></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="p00">File to be attached (< 5Mo)</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input id="bt0" type="file" name="file" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>
                       <button
                        id="b1"
                        type="button"
                        name="button"
                        class="butt"
                        onclick="myFunction01()"
                      > 
                      
                        Send
                      </button>
                      <span class="close0001">
                      <button class="b0001">Close</button> </span> </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </fieldset>
        </div> 


        <center>
            <img class="img321" src="m/image0104.webp" width="30px" height="30px" alt="image0102" onclick="myFunction1('https://www.facebook.com/worldwildlifefund')" />
            <img style="cursor: pointer; border-radius: 50%" src="m/image0105.webp" width="30px" height="30px" alt="image0105" onclick="myFunction1('https://x.com/Fouad_Bechar')" />
            <img src="m/youtb.webp" alt="image0105" style="cursor: pointer;" width="43px" height="30px" onclick="myFunction1('https://www.youtube.com/channel/UCi3RVanUvgW2o1Ld5lt7EjA')"/>
            <img  class="open0001" src="m/contact.webp" alt="image" width="100px" height="33px">
            
            <!-- <img class="accordion" src="m/contact.webp" alt="image" width="100px" height="33px">-->
           <!-- <div class="panel">
                <fieldset>
                <form action="../p/p02" method="POST" enctype="multipart/form-data">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="p0">First name</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="input0" type="text" name="prenom" placeholder="First name" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Last name</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="input0" type="text" name="nom" placeholder="Last name" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Gender</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><select class="select0" name="sexe" required>
                                            <option>- - - - - -</option>
                                            <option value="MASCULIN">masculine</option>
                                            <option value="FEMININ">feminine</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Date of Birth</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="input0" type="Date" name="daten" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">E-mail</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="input0" type="email" name="email" placeholder="E-mail" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Phone</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <input class="input0" type="tel" name="tel" placeholder="Phone"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Address</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="input0" type="text" name="adresse" placeholder="Address"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="visibility: hidden">heading</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p0">Your message</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><textarea name="textarea" rows="10" cols="50" placeholder="Your message"></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="p00"> File to be attached (< 5Mo) </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="bt0" type="file" name="file">
                                    </td>
                                </tr>
                                <tr>
                                    <td><button id="b1" type="button" name="button" class="butt" onclick="myFunction01()">Send</button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </fieldset>
            </div>-->

            <div id="currentDateTime"></div>
        </center>
    </footer>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

    <script>
        function myFunction01() {
            var text = "Are you sure about the information !";
            var but = document.getElementById("b1");
            if (confirm(text) == true) {
                but.type = "submit";
            } else {
                but.type = "button";
            }
        }
    </script>


    <script>
        var modal = document.getElementById('id01');

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        var modal = document.getElementById('id02');

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        function getid() {
            document.getElementById('id02').style.display = 'block'
        }
    </script>
    <script>
        const currentDateTime = document.getElementById("currentDateTime");

        function displayDateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = now.toLocaleDateString(undefined, options);
            const time = now.toLocaleTimeString();
            currentDateTime.innerHTML = date + "." + "&nbsp;" + "&nbsp;" + time;
        }
        setInterval(displayDateTime, 1000);
    </script>
    <script>
        const openipt = document.querySelector(".img257");
        const closeipt = document.querySelector(".input0114");
        const ipt = document.querySelector(".inputt");
        openipt.addEventListener("click", () => {
            ipt.style.width = "150px";
            ipt.style.paddingLeft = "10px";
            ipt.style.paddingRight = "5px";
        });
        closeipt.addEventListener("click", () => {
            ipt.style.width = "0px";
            ipt.style.paddingLeft = "0px";
            ipt.style.paddingRight = "0px";
        });
        document.querySelector('.form').onsubmit = e => {
            e.target.submit();
            e.target.reset();
            return false;
        };
    </script>
    </script>
    <script>
        var vido
        var clo
        var im00
        var aaa001
        var divvv12

        function video() {
            vido = document.getElementById("vid");
            clo = document.getElementById("cl");
            im00 = document.getElementById("im0");
            aaa001 = document.getElementById("aa001");
            divvv12 = document.getElementById("divv12");
            vido.src = "https://res.cloudinary.com/dougpslkv/video/upload/v1708992004/WWF.mp4";
            clo.style.display = "block";
            vido.style.display = "block";
            aaa001.style.display = "block";
            im00.style.display = "none";
            divvv12.style.display = "none";
        }

        function closse() {
            vido = document.getElementById("vid");
            clo = document.getElementById("cl");
            clo.style.display = "none";
            vido.style.display = "none";
            aaa001.style.display = "none";
            im00.style.display = "block";
            divvv12.style.display = "block";
            vido.src = "";
        }
    </script>

    <script>
      const openPop119 = document.querySelector(".open0001");
      const closePop119 = document.querySelector(".close0001");
      const wrapper9 = document.querySelector(".wrapper0001");
     
      openPop119.addEventListener("click", () => {
        wrapper9.classList.add("active");
       
      });
      closePop119.addEventListener("click", () => {
        wrapper9.classList.remove("active");
      
      });
    </script>

    <script>
        function myFunction1(url) {
            window.open(url, "_blank");
        }

        function myFunction2(url) {
            window.open(url, "_parent");
        }
    </script>
    <script>
        function openNav() {
            document.getElementById("myNav").style.height = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.height = "0%";
        }
    </script>
    <script>
        var cliq

        function clic() {
            cliq = document.getElementById("cliq");
            cliq.style.display = "none";
        }
    </script>
    <script>
        function myFunction001() {
            var text = "Are you sure to delete your account !";
            var delt = document.getElementById("d1");
            if (confirm(text) == true) {
                delt.href = "delete";
            } else {
                delt.href = "";
            }
        }
    </script>
</body>

</html>