<?php
    $msg='';
    $servername = "sql200.epizy.com";
    $username = "epiz_28564874";
    $password = "zwV9AzP1Gh";
    $dbname = "epiz_28564874_Myseproject";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['user']) && !empty($_POST['user']) AND isset($_POST['pass']) && !empty($_POST['pass'])) {
    $username = mysqli_real_escape_string($conn,$_POST['user']); // Set variable for the username
    $sql="SELECT password FROM users WHERE active = '1' AND username = '" . $username . "'";
    $result_b=$conn->query($sql);
    $result=$result_b->fetch_assoc();
    //$result=mysqli_query($conn,"SELECT password FROM Users WHERE active = '1' AND username = '" . $username . "'")->fetch_assoc();
    $password_hash = (isset($result['password']) ? $result['password'] : '');
    //$res = password_verify($_POST['password'], $password_hash);
    //echo $res;
    if(password_verify($_POST['pass'], $password_hash)){
        $msg = 'Login Complete! Thanks';
        header("Location: homepage.html");
        // Set cookie / Start Session / Start Download etc...
    }
    else{
            $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
    }
}
?>