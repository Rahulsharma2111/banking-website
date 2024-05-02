<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    body {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        /* filter: opacity(0.5); */
        /* background-image: url("./bank_images/login money.gif"); */
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


    <div id="Verifitiondiv">


        <span>Fill Login From</span>
        <form action="./adminLogin.php" method="POST">

            <input type="text" name="admin_username" id="UsernameVerfiy" placeholder="Enter Username">
            <br><br>
            <span>
                <input type="password" name="admin_password" id="passwordVerfiy" placeholder=" Enter Password" /><br>
                <a href="./adminProfileUpdate/adminForgetpassword.php" name="forgetPassword">forget
                    passwod</a></span><br><br>
            <input type="submit" name="submit" value="Login" id="loninBtnVerfiy">
            <!-- <br> -->
            <P style="font-size: 17px;"><a href="./admin_signUp.php">SignUp</a></P>
            <!-- <input type="submit" name="" onclick="verfiyAccount()" value="Login" id="loninBtnVerfiy"> -->

        </form>
    </div>
</body>

<?php

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'];
include $uploadDirectory . '/PHPauthemtication.php';
// include '../PHPauthemtication.php';
session_start();

// Simulated user data (replace with database retrieval)
// $validUsername = "user";
// $validPassword = "password";
// $validaccountNo = "accountnumber";


if (isset($_POST['submit'])) {
    $username = $_POST["admin_username"];
    $Password = $_POST["admin_password"];


    $sql = "SELECT * FROM admin_details WHERE  adminUsername= '$username' AND adminPassword='$Password'";

    // echo $sql1;
    $result = $con->query($sql);
    // if (($result = $con->query($sql1)) ===false) {
// echo "<h1>Enter correct details</h1>";
// exit;
// }

    $data = $result->fetch_object();

    // try {
        
        if (is_null($username) || empty($username) || $username != $data->adminUsername || $data->adminUsername == null) {
            echo "Enter username correct";
            exit;
        }
       
    // } catch (\Throwable $th) {
    //     //throw $th;
    //     echo "Enter username correct".$th;
    // }

    if ($Password != $data->adminPassword || empty($Password) || is_null($Password)) {
        echo "Enter Password correct";
        exit;
    }
    if ($username == $data->adminUsername && $Password == $data->adminPassword) {

        $admin_EmpID = $data->EmpID;
        $_SESSION["sessAdminUsername"] = $username;
        $_SESSION["sessAdminPassword"] = $Password;
        $_SESSION["sessAdminEmail"] = $data->adminEmail;
        $_SESSION["sessAdminEmpID"] = $admin_EmpID;

        header("Location:./adminDashboard.php");
    }



    // if{
    //     echo "something worng try again";
    // }

    // echo "<pre>";
    // echo "Object";
    // print_r($data);
    // 


    if ($con->query($sql) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        // header("alert.html");
        echo " Error: <br>" . $con->error;
    }

}


$con->close();


?>

</html>