<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
</head>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 150px;

    }

    #forgetPassword {
        width: 250px;
        height: 250px;
        border: 4px solid black;
        border-radius: 50px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        row-gap: 10px;


    }

    input {
        width: 217px;
        height: 18px;
        border: 2px solid rgba(58, 54, 54, 0.76);
        border-radius: 5px;
        font-size: 15px;
        font-family: cursive;


    }

    #submit {
        width: 100px;
        height: 25px;
        border-radius: 15px;
        border-color: #000000;
        font-weight: bold;
        font-family: sans-serif;


        /* color: #fff;
    background-color: #3a2c2cc7; */
    }
</style>

<body>
    <form action="./adminForgetpassword.php" method="POST">
        <div id="forgetPassword">
            <label for="Username"></label>
            <input type="text" id="Usernameforget" name="Usernameforget" placeholder="UserName">

            <label for="mobile"></label>
            <input type="number" id="mobileforget" name="mobileforget" placeholder="Mobile Number">

            <label for="email"></label>
            <input type="email" id="emailforget" name="emailforget" placeholder="E-mail">

            <input type="submit" name="submit" id="submit">
            <!-- <input type="submit" onclick="forgetPassword()" id="submit"> -->
        </div>
    </form>
</body>
<?php
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'];
include $uploadDirectory . '/PHPauthemtication.php';
session_start();
// if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
//     header("Location: chekStatusVerfiy.php");
//     // exit;
// }


// Simulated user data (replace with database retrieval)


if (isset($_POST['submit'])) {
    $username = $_POST["Usernameforget"];
    $mobile = $_POST["mobileforget"];
    $email = $_POST["emailforget"];

    $sql1 = "SELECT * FROM admin_details WHERE  adminUsername= '$username' AND adminMobileNumber='$mobile' AND adminEmail= '$email'";

    // echo $sql1;
    $result = $con->query($sql1);

    $data = $result->fetch_object();

    $name = $data->adminUsername;
    $mobileNo = $data->adminMobileNumber;
    $EmailID = $data->adminEmail;

    if ($username == $name && $mobile == $mobileNo && $email == $EmailID) {
        $_SESSION["sessAdminUsername"] = $username;
        $_SESSION["sessAdminMobile"] = $mobile;
        $_SESSION["sessAdminEmail"] = $email;
        
//         echo $_SESSION["sessAdminUsername"];
//         echo $_SESSION["sessAdminMobile"] ;
//         echo $_SESSION["sessAdminEmail"] ;
// exit;

        header("Location:./adminConfirmPassword.php");
    }



    if ($con->query($sql1) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "  Error: " . $sql1 . "<br>" . $con->error;
        // echo "Error: " . $sql1 . "<br>" . $con->error;
    }
}
$con->close();


?>

</html>