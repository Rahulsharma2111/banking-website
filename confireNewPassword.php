<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Change Password</title>
</head>
<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 150px;
  }

  #confirmPassword {
    width: 280px;
    height: 180px;
    border: 4px solid rgb(69, 130, 141);
    border-radius: 50px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    row-gap: 10px;
  }

  label {
    font-family: cursive;
  }

  input {
    width: 217px;
    height: 18px;
    border: 2px solid rgba(58, 54, 54, 0.76);
    border-radius: 5px;
    font-size: 15px;
  }

  #newpasswordbtn {
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
<?php
// echo "<pre style='text-align: center;'>";
// // [REQUEST_URI] => /confireNewPassword.php
// print_r($_SERVER);
?>

<body>
  <div id="confirmPassword">
    <form action="confireNewPassword.php" method="POST">
      <div>
        <label for="newpassword">Enter New Password</label>
        <br />
        <input type="password" id="newpassword" name="newpassword" placeholder="new password" />
      </div>
      <div>
        <label for="confirmnewpassword">Confirm New Password</label>
        <br />
        <input type="password" id="confirmnewpassword" name="confirmnewpassword" placeholder="confirm new password" />
      </div>
      <br>
      <input type="submit" value="submit" id="newpasswordbtn" name="newpasswordbtn" />

    </form>
  </div>
</body>
<?php
require 'PHPauthemtication.php';
session_start();

// session_name();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: forgetPassword.php");
  // exit;
}
$username = $_SESSION["username"];
$mobile = $_SESSION["mobile"];
$email = $_SESSION["Email"];

$sql1 = "SELECT * FROM bankcustmordetails WHERE  username= '$username' AND mobilenumber='$mobile' AND emailid= '$email'";

// echo $sql1;
$resultsql1 = $con->query($sql1);
$data = $resultsql1->fetch_object();
// echo "<br>";
// echo $data->emailid;
// echo "<br>";
// echo $data->accountNumber;
// echo "<br>";
// echo $data->mobilenumber;
// echo "<br>";


if (isset($_POST['newpasswordbtn'])) {
  $newPassword = $_POST['newpassword'];
  $newConfirmPassword = $_POST['confirmnewpassword'];

  // echo "<br>";
  // echo $_SESSION["username"];
  // echo "  ";
  // echo $_SESSION["mobile"];
  // echo "  ";
  // echo $_SESSION["Email"];
  // echo "  ";

  if ($newPassword === $newConfirmPassword) {
    $sql2 = " UPDATE bankcustmordetails SET userpassword='$newConfirmPassword'  WHERE username= '$username' AND emailid= '$email'";

    $resultsql2 = $con->query($sql2);
    echo "successfully update password ";

    header("Location: chekStatusVerfiy.php");

  } else {
    echo "something Is wrong";
  }

}


$con->close();

?>


<!-- <script defer>
    function setNewPassword() {
      // console.log(document.getElementById('newpassword')?newpassword.value:null);
      // console.log( document.getElementById('confirmnewpassword')?confirmnewpassword.value:null);

      var newpassword = document.getElementById("newpassword").value;
      var confirmnewpassword =
        document.getElementById("confirmnewpassword").value;

      console.log(newpassword, confirmnewpassword);

      // if (newpassword !== confirmnewpassword || newpassword == null || confirmnewpassword == null
      if (newpassword == confirmnewpassword) {
        function OTP() {
          var OtpVerfication = Math.trunc(Math.random() * 999999);
          var UserEnterOTP = prompt(`Please enter OTP is ${OtpVerfication}`);
          

          if (UserEnterOTP == OtpVerfication) {
            // alert("Your Profile is Updated");
            alert("Password Change succesfully");
            localStorage.setItem("password", confirmnewpassword);

            newpassword = "";
            confirmnewpassword = "";
           
            // cheak status verfiy page link
            window.location.href ="./check_status.html";
            // window.location.href ="http://127.0.0.1:5500/check_status.html";
          } else {
            alert(" Please enter corret OTP");
          }
        }
      } else {
        console.log(" not match");
      }
      
      OTP();
    }
  </script> -->

</html>