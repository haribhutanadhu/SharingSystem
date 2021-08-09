<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SignUp</title>
<style>
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px;
}
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}
input[type=submit]{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px;
}
</style>
</head>
<body>
<div class="login">
<h1 align="center">Signup</h1>

<?php
    $servername = "sql200.epizy.com";
    $username = "epiz_28564874";
    $password = "zwV9AzP1Gh";
    $dbname = "epiz_28564874_Myseproject";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['name'])&&!empty($_POST['name']) AND isset($_POST['email'])&&!empty($_POST['email'])){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){
            $msg = 'The email you have entered is invalid, please try again.';
        }
        else{
            $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
            $hash=md5(rand(0,1000));
            $password=mysqli_real_escape_string($conn,$_POST['pass']);              //rand(1000,5000);
            $sql="INSERT INTO users (username , password, email, hash) VALUES ('".mysqli_real_escape_string($conn,$name)."','".mysqli_real_escape_string($conn,password_hash($password, PASSWORD_DEFAULT))."','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$hash)."')";
            $query=mysqli_query($conn,$sql);
            try {
            //Content
            $to=$email;
            $subject='SignUp|Verification';
            $message= '
            Thanks for Signing up!<br>
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>
            ------------------------<br>
            Username:'.$name.'<br>
            Password:'.$password.'<br>
            ------------------------<br>

            Please click this link to activate your account:<br>
            http://sharingsystem.great-site.net/verify.php?email='.$email.'&hash='.$hash.'<br>
            ';
            $headers='From: sethuvamsikrishna@gmail.com'."\r\n";
            mail($to,$subject,$message,$headers);
            echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
        ?>
<form action="" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="user" name="name"><br/><br/>
<input type="text" placeholder="email" id="email" name="email"><br/><br/>
<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
<input type="password" placeholder="Re-enter Password" id="repass" name="repass"><br/><br/>
<input type="submit" value="Signup" name="submit">
<p>Already have an account? <a href="login.php">Login here</a></p>

<!-- Error Message -->
<span><?php echo $msg; ?></span> 
</body>
</html>