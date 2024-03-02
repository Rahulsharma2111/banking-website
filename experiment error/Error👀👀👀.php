<?php
$ram = [5, 2, 5, 4, 93, 18, 54, 5,];
$ram1 = [];
echo "<pre>";
print_r($ram);
print_r($ram1);


function accNumber($length = 15)
{
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= random_int(0, 9);
        echo "$i</br>";
    }

    return $otp;
}
// $accountNumber=accNumber();
// echo $accountNumber;


// require 'OTPauthantication.php';
include 'allfunctionHere.php';
$rarara = otpfunc();
echo $rarara . "<br>";
echo $rarara . "<br>";
echo $rarara . "<br>";
echo $rarara . "<br>";

echo "the end is end "
    // Existing transaction array (as you've shown)
// $transactions = array(
//     array(
//         "type" => "debit",
//         "amount" => 0,
//         "bankbalance" => 0,
//         "date" => "2023-08-17",
//         "time" => "10:30 AM",
//         "method" => "no"
//     ),
//     // ... other transactions ...
// );
// 
// // Create a new transaction record
// $newTransaction = array(
//     "type" => "debit",
//     "amount" => 50,
//     "bankbalance" => 1000, // Update the bank balance accordingly
//     "date" => "2023-08-17",
//     "time" => date("H:i:s"), // Current time in HH:MM:SS format
//     "method" => "Check"
// );
// 
// // Append the new transaction to the existing array
// $transactions[] = $newTransaction;
// 
// // Convert the updated array to JSON format
// $updatedTransactionJSON = json_encode($transactions);
// 
// // Update your database with the new JSON data if needed
// // ...
// 
// // Print the updated JSON for testing
// echo $updatedTransactionJSON;


    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <?php 

// if (isset($_GET['sub'])) {
//     $photo1 = $_GET['photo1'];
//     $photo2 = $_GET['photo2'];
// 
//     // if (isset($photo1)&&isset($photo2)) {}
//  
//         if ($photo1 == '' || $photo2 == '') {
//             echo "<script>
//         
//         hide.style.display = 'block';
//         hide.style.color = 'red';
//       hide.innerHTML = '<h1>Please Enter valid details</h1>';
//         setInterval(timefun, 6000);
//         </script>";
//             echo "hello";
//             die();
//         } else {
//             echo $photo1;
//             echo $photo2;
//         }
//     }

?> 



<body>
    <form action="Error👀👀👀.php" method="get" enctype="multipart/form-data">
        <div class="errordisplay" id="errordisplay" style="text-align: center;display:none"></div>
        <input type="text" name="photo1" id="photo1" require>
        <input type="text" name="photo2" id="photo2"require>
        <input type="submit" name="sub" id="sub">
    </form>
</body>
<script>
    let hide = document.getElementById('errordisplay');
    function timefun() {
        let hide = document.getElementById('errordisplay');
        hide.style.display = "none";
    }
</script>
<?php

// include("./PHPauthemtication.php");

if (isset($_GET['sub'])) {
    $photo1 = $_GET['photo1'];
    $photo2 = $_GET['photo2'];

    // if (isset($photo1)&&isset($photo2)) {}


        if ($photo1 == '' || $photo2 == '') {
            echo "<script>
        
        hide.style.display = 'block';
        hide.style.color = 'red';
      hide.innerHTML = '<h1>Please Enter valid details</h1>';
        setInterval(timefun, 6000);
        </script>";
            echo "hello";
            die();
        } else {
            echo $photo1;
            echo $photo2;
        }
    }



// // Set the timezone to India
// date_default_timezone_set('Asia/Kolkata');
// 
// // Get the current date and time
// $currentDateTime = date("Y-m-d H:i:s");
// 
// // Display the current date and time
// echo "Current Date and Time in India: " . $currentDateTime."<br>";
// 
// 
// // Using date() function
// $currentDateTime = date("Y-m-d H:i:s"); // Format: Year-Month-Day Hour:Minute:Second
// echo "Current Date and Time: " . $currentDateTime;
// 
// // Using DateTime class
// $dateTime = new DateTime();
// $currentDateTime = $dateTime->format("Y-m-d H:i:s"); // Format: Year-Month-Day Hour:Minute:Second
// echo "Current Date and Time: " . $currentDateTime;
// 
// 
// if (isset($_POST['sub'])) {
//     echo "<pre>";
//     print_r($_FILES);
// 
//     $uer = $_FILES["photo1"]["tmp_name"];
//     $fileName = "rahul21_images";
//     move_uploaded_file($uer, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $fileName.".".strtolower(pathinfo($_FILES["photo1"]["name"], PATHINFO_EXTENSION)));
// 
//     $uer2 = $_FILES["photo2"]["tmp_name"];
//     $add = "myfolder👀👀";
//     $fileName23 = "rahul21_ima345";
// 
//     // create folder
//     if (mkdir("C:/xampp/htdocs/bank website using php/Bank_customer_image/".$add)) {
//         echo "folder is created";
//     }
// 
//     move_uploaded_file($uer2, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $add . "/" . $fileName23 .".".strtolower(pathinfo($_FILES["photo2"]["name"], PATHINFO_EXTENSION)));
//     echo "Image Upload successfully";
// }




?>

</html>

<!-- CREATE TABLE AccountBalance(
    accountNumber BIGINT(15) NOT NULL UNIQUE,
    BankBalance DECIMAL(5, 2) NOT NULL unsingned,
    FOREIGN KEY(accountNumber)
); -->