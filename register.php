<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $sex = $_POST['sex'];
        $birthday = $_POST['birthday'];
        $job = $_POST['job'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

      
        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel, email, tel, sex, birthday, job)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm', '$email', '$tel', '$sex', '$birthday', '$job')";
            $result = mysqli_query($conn, $query);
            if ($_POST["password"] === $_POST["confirm_password"]) {
              // success!
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
          }
          else {
            echo "<script>alert('password wrong');</script>";
              // failed :(
           }
        }
      
       

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,height=device-height">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

   <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<style>
body {
  margin: 0;
  background-color: #e3dbd1;
  font-family: Arial, Helvetica, sans-serif;
}

@font-face {
  font-family: 'MyKidsHandwrittenRegular';
  src: url('MyKidsHandwrittenRegular.eot') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}


.col-auto{
  margin:auto ;
}

 .bot-bar {
position:  relative;
width: 100%;
height: 182px;
left: 0px;
top: 842px;
bottom: 0px;

background: #1C3C25;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 25px;
line-height: 29px;
text-align: center;
color: #FFFFFF;
}

.side-bg {
position: fixed;
width: 250px;
height: 100%;
left: 0px;
top: 0px;
background: #445b47;

}

#navbar {
  background-color: #FFFFFF;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: inline-block;
  transition: top 0.3s;
  z-index: 3;
}

#navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 14px;
  color: #fc9885;
}
#navbar span {
  float: left;
  display: inline-block;
  color: #fc9885;
  text-align: center;
  padding: 25px;
  text-decoration: none;
  font-size: 25px;
  overflow: hidden;
  position: relative;
}
#navbar span.icon {
  float: left ;
  display: inline-block;
  text-align: center;
  padding:0px;
  text-decoration: none;
  font-size: 20px;
  overflow: hidden;
  position: relative;
}
#navbar a:hover {
  background-color: #ddd;
  color: black;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 4;
  top: 0;
  left: 0;
  background-color: #2F2C2C;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
 
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.5s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left 0.8s;
  padding: 15px;

}
@media screen and (max-height: 600px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media screen and (max-width: 768px) {
  .side-bg {
    display: none;
  }
  .loginbar {
    display: none;
  }
  .icon {
    float: center;
    position: absolute;
    top: 0;
    
  }
  .data-slide #container{
    display: inline-block;
    width: 100%;
    position: absolute;
    left: -280px;
  }
  
}
@media screen and (max-width: 992px){
    .bot-bar {
    height: 320px;
    display: inline-block;
  }
}
@media screen and (max-width: 900px){
  .header-website {
    position: relative;
    display: block;
    left: -100px;
  }
}
</style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="mainpage.html"><img src="/php/loginadminuser/pic/Group 10.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 11.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 12.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 13.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 14.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 15.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 16.png"></a>
  <div style="position: absolute;bottom: 0px;">
  <p><p><p></p><a href="#"><img src="/php/loginadminuser/pic/Group 17.png"></a></p></div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="mainpage.html"><img src="/php/loginadminuser/pic/Group 10.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 11.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 12.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 13.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 14.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 15.png"></a>
  <a href="#"><img src="/php/loginadminuser/pic/Group 16.png"></a>
  <div style="position: absolute;bottom: 0px;">
  <p><p><p></p><a href="#"><img src="/php/loginadminuser/pic/Group 17.png"></a></p></div>
</div>

<div class="container">
        <div class="row">
<div id="navbar">
<span style="font-size:35px;cursor:pointer;" onclick="openNav()">&#9776;</span>

<span class="icon"> <a href="mainpage.html"> 
    <img src="/php/loginadminuser/pic/66.png" width="160" height="90" alt="" loading="lazy">
  </a>
 </span>

 <div class="col-lg-2 col-md-2 col-lg-2 offset-lg-7 offset-9" style="padding-right:20px;">
   <div class="row" style="float: right;">
   <a href="#changlanguage"><img src="/php/loginadminuser/pic/Group 3.png" alt="th/eng"></a> 
  </div>
  
   <div class="row" style="float: right;margin-right: auto;">
    <div class="col-auto">
      <div class="loginbar">
   <a href="#Register"style=><img src="/php/loginadminuser/pic/Group 5.png" alt="Register"></a> 
   <a href="#Login"style=><img src="/php/loginadminuser/pic/Group 7.png" alt="Login"></a> 
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-300px";
  }
  prevScrollpos = currentScrollPos;
}
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

</script>


<div class="bot-bar"style="z-index:2;">
  <div class="container">
    <div class="row justify-content-center" style="margin-top:20px;">
      <div class="col-auto"style="font-family: 'MykidsHandwrittenRegular;'
      !improtant;">
        <h1>About us</h1><p>
          <p>What's Planveler?
            <p>How to use
      </div>
      <div class="col-auto">
        <h1>Contact us</h1><p>
          <p>Address
            <p>E-mail
      </div>
      <div class="col-auto">
        <h1>Planveler Policies</h1><p>
          <p>Terms & Conditions
            <p>Help Center
      </div>
      <div class="col-auto">
        <h1>Follow us</h1><p>
          <a href="#facebook"><img src="/php/loginadminuser/pic/Facebook logo 2.png"></a><p></p>
           <a href="#line"><img src="/php/loginadminuser/pic/Line logo 1.png"></a>
           <a href="#ig"><img src="/php/loginadminuser/pic/Instragram Logo 2.png"></a>
      </div>
  </div>
</div>
</div>
<div class="side-bg">
  
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div style ="position: absolute;width: 376.09px;height: 42.9px;left:398px;top: 433px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="username"></label>
        <input type="text" name="username" placeholder="Username" required>
          </div>
          <div style ="position: absolute;width: 376.09px;height: 42.9px;left: 398px;top: 691px;; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="password"></label>
        <input type="password" name="password" placeholder="Password" required>
          </div>
          <div style ="position: absolute;width: 376.09px;height: 42.9px;left: 400px;top: 756px;; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="confirm_password"></label>
        <input type="password" name="confirm_password" placeholder="Confirm-password" required>
          </div>
          <div style ="position: absolute;width: 376.09px;height: 42.9px;left: 399px;top: 559.6px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="firstname"></label>
        <input type="text" name="firstname" placeholder="Firstname" required>
          </div>
          <div style ="position: absolute;width: 376.09px;height: 42.9px;left: 399px;top: 624px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="lastname"></label>
        <input type="text" name="lastname" placeholder="Lastname" required>
        </div>
        <div style ="position: absolute;width: 376.09px;height: 42.9px;left: 399px;top: 495px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="email"></label>
        <input type="email" name="email" placeholder="Email" required>
        </div>
        <div style ="position: absolute;width: 203px;height: 43px;left: 1077px;top: 519px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
          <label for="tel"></label>
          <input type="tel" name="tel" placeholder="Tel." required>
       </div>
       <div style ="position: absolute;left: 1080px;top: 428px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
       <input type="radio" id="male" name="sex" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="sex" value="Female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="sex" value="Other">
        <label for="other">Other</label>
        <!--<label for="sex">Gender</label>
        <select id="sex">
          <option value="1">Man</option>
          <option value="2">Woman</option>
          <option value="3">Lesbian</option>
          <option value="4">Gay</option>
          <option value="5">Bisexual</option>
          <option value="6">Transgender</option>
        </select>-->

          <!--<input type="text" name="sex" placeholder="Gender" required>-->
        </div>
        <div style ="position: absolute;width: 203px;height: 43px;left: 1077px;top: 605px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="birthday"></label>
          <input type="date" name="birthday" placeholder="Birthday" required>
        </div>
        <div style ="position: absolute;left: 1187px;top: 429px; border: 2px solid red;border-radius: 50px;background: #EAEAEA;">
        <label for="job"></label>
          <input type="text" name="job" placeholder="Jobs" required>
        </div>
        <div style ="position: absolute;width: 139px;height: 51px;left: 1115px;top: 769px; border: 2px solid red;border-radius: 50px;">
        <input type="submit" name="submit" value="Register">
    
    </form>

    <a href="index.php">Go back to Login</a>
    
</body>
</html>