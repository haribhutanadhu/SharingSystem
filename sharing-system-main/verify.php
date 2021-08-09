<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
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
    </style>
</head>
<body>
    <div class="login">
        <div id="header">
        <h3>Verification</h3>
        </div>
        <?php
            $servername = "sql200.epizy.com";
            $username = "epiz_28564874";
            $password = "zwV9AzP1Gh";
            $dbname = "epiz_28564874_Myseproject";
            $conn = new mysqli($servername, $username, $password, $dbname);
              
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                $email = mysqli_real_escape_string($conn,$_GET['email']); // Set email variable
                $hash = mysqli_real_escape_string($conn,$_GET['hash']); // Set hash variable
                
                $sql="SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
                //$search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
                $query=mysqli_query($conn,$sql);
                $match  = mysqli_num_rows($query);
                  
                if($match > 0){
                    // We have a match, activate the account
                    mysqli_query($conn,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                    echo '<div class="statusmsg">Your account has been activated, you can now login<br>
                                                Please click these link for going to login page:<br>
                                                <a href="http://sharingsystem.great-site.net/login.php">Login page</a></div>';
                }
                else{
                    // No match -> invalid url or account has already been activated.
                    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.<br>
                                                Please click these link for going to login page:<br>
                                                <a href="http://sharingsystem.great-site.net/login.php">Login page</a></div>';
                }  
            }
            else{
                // Invalid approach
                echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
            }
        ?>
    </div>
</body>
</html>