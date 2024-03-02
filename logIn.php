<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify page</title>
</head>
<style>
    body {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        /* filter: opacity(0.5); */
        background-image: url("bank_images/login money.gif");
        background-position: center;
        background-size: cover;
        border-radius: 15px;
    }

    #Verifitiondiv {
        width: 315px;
        height: 315px;
        border: black 2px solid;
        border-radius: 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* margin-top: 125px; */
        row-gap: 20px;
        /* z-index: 11; */
        background-color: rgba(197, 165, 165, 0.336);
        backdrop-filter: blur(3px);

    }

    input {
        width: 217px;
        height: 18px;
        border: 2px solid rgba(58, 54, 54, 0.76);
        border-radius: 5px;

        font-size: 15px;
        font-weight: bold;

    }

    #loninBtnVerfiy {
        width: 100px;
        height: 25px;
        border-radius: 15px;
        border-color: #000000;
        color: #fff;
        background-color: #3a2c2cc7;

    }

    #text {
        font-size: 22px;
        font-weight: bold;
        font-family: cursive;

    }

    #errorDisplay {
        width: 100%;
        height: 40px;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0px;
        margin-top: 0px;
        background-color: #969292ba;
        color: #ff0000bf;
        font-size: 20px;
        font-weight: bold;
        display: none;
        /* z-index: 1111; */
        border-radius: 20px;
    }

    @media only screen and (max-width:254px) {
        body {
            overflow: hidden;
        }

        input {
            width: 73vw;
            height: 15px;

        }

        #Verifitiondiv {
            height: 94vh;
        }

        #text {
            font-size: 10vw;
        }
    }
</style>

<body>


    <div id="Verifitiondiv">


        <span>Fill Login From</span><!--  -->
        <div id="errorDisplay"></div>
        <form action="logIn.php" method="POST">

            <input type="text" name="username" id="UsernameVerfiy" placeholder="Enter Username">
            <br><br>
            <span>
                <input type="password" name="Password" id="passwordVerfiy" placeholder=" Enter Password" /><br>
                <a href="forgetPassword.php" name="forgetPassword">forget passwod</a></span><br><br>
            <input type="submit" name="submit" value="Login" id="loninBtnVerfiy">
            <!-- <br> -->
            <P style="font-size: 17px;"><a href="./Signup.php">SignUp</a></P>
            <!-- <input type="submit" name="" onclick="verfiyAccount()" value="Login" id="loninBtnVerfiy"> -->
            <!-- logIn.php -->
        </form>
    </div>
</body>
<script>
    let errorDisplay = document.getElementById('errorDisplay');
    function errorHideTime() {
        errorDisplay.style.display = "none";
    }
</script>
<?php
include 'PHPauthemtication.php';
session_start();


if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $Password = $_POST["Password"];

    if (empty($username) || $username == '') {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Please Enter Username';
setInterval(errorHideTime, 6000);
</script>";
        die();

    }
    if (empty($Password) || $Password == '') {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Please Enter Password';
setInterval(errorHideTime, 6000);
</script>";
        die();

    }

    $sql1 = "SELECT firstname, fathername, mobilenumber, username, userpassword, accountNumber FROM bankcustmordetails WHERE  username= '$username' ";
    // AND userpassword='$Password'
    // echo $sql1;
    $result = $con->query($sql1);


    $data = $result->fetch_object();

    if (empty($data->username) || $username != $data->username) {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Please Enter correct Username';
setInterval(errorHideTime, 6000);
</script>";
        die();

    }
    if (empty($data->userpassword) || $Password != $data->userpassword) {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Please Enter correct Password';
setInterval(errorHideTime, 6000);
</script>";
        die();

    }
    if ($username == $data->username && $Password == $data->userpassword) {

        $accountnumber = $data->accountNumber;
        $_SESSION["username"] = $username;
        $_SESSION["Password"] = $Password;
        $_SESSION["accountnumber"] = $accountnumber;

        header("Location:check_status.php");
    }



    if ($con->query($sql1) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo " Error: <br>" . $con->error;
    }

}


$con->close();


?>



</html>