<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="697458388102-8eq0bhplv861kjro168ek0vhmq218l38.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>

<script>
  function onSignIn(userInfo) {
    var result = '';
    // Result: <textarea id="result"></textarea> อยู่บนscript ล่าง class = g-signin2
     Useful data for your client-side scripts:
    var profile = userInfo.getBasicProfile();
    
    result+= "ID: "+profile.getId()+"\n";
    result+= "Full Name:  "+profile.getName()+"\n";
    result+= "Given Name: "+profile.getGivenName()+"\n";
    result+= "Family Name: "+profile.getFamilyName()+"\n";
    result+= "Email: "+profile.getEmail()+"\n";
    result+= "ID Token: "+userInfo.getAuthResponse().id_token+"\n";
    
    document.getElementById("result").value = result;
  };
</script>
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
<br>

    



    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>


    <form action="login.php" method="post">

        <label for="username"></label>
        <input type="text" name="username" placeholder="Username" required>
        <br><br>
        <label for="password"></label>
        <input type="password" name="password" placeholder="Password" required>
        <br><br>
        <input type="submit" name="submit" value="login">

    </form>
    <script>
  function onSignIn(userInfo) {
    var result = '';
    // Result: <textarea id="result"></textarea> อยู่บนscript ล่าง class = g-signin2
    // Useful data for your client-side scripts:
    var profile = userInfo.getBasicProfile();
    
    result+= "ID: "+profile.getId()+"\n";
    result+= "Full Name:  "+profile.getName()+"\n";
    result+= "Given Name: "+profile.getGivenName()+"\n";
    result+= "Family Name: "+profile.getFamilyName()+"\n";
    result+= "Email: "+profile.getEmail()+"\n";
    result+= "ID Token: "+userInfo.getAuthResponse().id_token+"\n";
    
    document.getElementById("result").value = result;
  };
</script>

    <a href="register.php">Go to register</a>
    <br>
    <a href="forgotpassword2.php">Forgot your password?</a>
    
</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>