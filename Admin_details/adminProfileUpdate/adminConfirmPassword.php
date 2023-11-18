<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Forget Password</title>
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
    <form action="adminConfirmPassword.php" method="POST">
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
// require 'PHPauthemtication.php';
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
session_start();

// session_name();
$sessAdminUsername = $_SESSION["sessAdminUsername"];
$sessAdminMobile = $_SESSION["sessAdminMobile"];
$sessAdminEmail = $_SESSION["sessAdminEmail"];
// Check if user is logged in
if (!isset($sessAdminUsername)) {
  header("Location: ./adminForgetpassword.php");
  exit;
}




$sql1 = "SELECT * FROM admin_details WHERE  adminUsername= '$sessAdminUsername' AND adminMobileNumber ='$sessAdminMobile' AND adminEmail= '$sessAdminEmail'";

// echo $sql1;
$resultsql1 = $con->query($sql1);
$data = $resultsql1->fetch_object();
// echo "<br>";
// echo $data->adminMobileNumber;
// echo "<br>";
// echo $data->adminEmail;
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
    $sql2 = " UPDATE admin_details SET	adminPassword='$newConfirmPassword'  WHERE adminUsername= '$sessAdminUsername' AND adminEmail= '$sessAdminEmail'";

    $resultsql2 = $con->query($sql2);
    echo "successfully update password ";

 $_SESSION["sessAdminPassword"]=$newConfirmPassword;
// exit;
    header("Location: ../admin_Profile.php");

  } else {
    echo "something Is wrong";
  }

}


$con->close();

?>


</html>