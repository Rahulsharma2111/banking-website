<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>expriment on this page</title>
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
    <section>
        <div id="error"></div>

        <div id="cardDetails">
            <fieldset>

                <legend id="text">Sign up</legend>
                <!-- <form action="UserNameAndPassword.php" method="POST"> -->
                <div class="Usernamediv">
                    <label for="UsernameVerfiy">Username</label>
                    <input type="text" id="UsernameVerfiy" name="username" placeholder="Enter Username">
                </div>
                <div class="Passworddiv">
                    <label for="passwordVerfiy">Password</label>
                    <input type="text" id="passwordVerfiy" name="Password" placeholder="Enter Password">
                    <br>
                    <a href="forgetPassword.html">forget passwod</a></span>
                </div>
                <button id="loninBtnVerfiy" name="submit">LogIn</button>
                <!-- </form> -->
            </fieldset>
        </div>

    </section>
</body>
<?php
require 'PHPauthemtication.php';
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $Password = $_POST["Password"];

    $sql1 = "SELECT firstname, fathername, mobilenumber, username FROM bankcustmordetails WHERE  username= '$username' AND userpassword='$Password'";

    // echo $sql1;
    $result = $con->query($sql1);

    $sita = $result->fetch_object();

    echo "<pre>";
    echo "Object";
    print_r($sita);



    if ($con->query($sql1) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "  Error: " . $sql1 . "<br>" . $con->error;
        // echo "Error: " . $sql1 . "<br>" . $con->error;
    }
}
$con->close();

// $sql1 = "SELECT * FROM stu_info";
// $result = $con->query($sql1);
// 
// $ram = mysqli_fetch_array($result, MYSQLI_NUM);
// $ram1 = mysqli_fetch_array($result, MYSQLI_BOTH);
// $sita = $result->fetch_object();
// 
// echo "<pre>";
// echo "Index array";
// print_r($ram);
// echo "Both Index and Assosicative array";
// print_r($ram1);
// echo "Object";
// print_r($sita);

?>

</html>