<!DOCTYPE html>
<html>

<head>
    <title>Payment from bank account</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    #bodyPaymentByAccount {
        height: 100vh;
        width: 100vw;
        background-image: url("bank_images/payment by bank.gif");
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;


    }

    #PaymentDiv {
        border: 4px solid #fff;
        border-radius: 15px;
        text-align: center;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        padding: 40px;
        backdrop-filter: blur(5px);
    }

    label {
        color: #fff;
        font-size: 36px;
        text-shadow: 2px 2px 3px black;
    }

    input[type="number"] {
        height: 26px;
        padding: 7px;
        margin-top: 6px;
        border: 2px black solid;
        border-radius: 15px;
    }

    input[type="submit"] {
        border-radius: 15px;
        height: 26px;
        cursor: pointer;
    }

    input:hover {
        border: rgb(254, 255, 254);
    }

    @media only screen  and (max-width:600px) {
        
        /* body{
            background-color: blue;
        } */
        #PaymentDiv {
            
            transform: scale(2.5);
            

        }

    }
    #error {
        color: red;
        height: 40px;
        width: 98%;
        background-color: rgba(212, 112, 112, 0.623);
        border-bottom: red 2px solid;
        border-radius: 15px 15px 0 0;
        text-align: center;
        font-size: 30px;
        position: absolute;
        top: 5px;
        z-index: 10;
        transition: 0.1s;
        display: none;

    }


   
</style>

<?php
require 'PHPauthemtication.php';
session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: chekStatusVerfiy.php");
    // exit;
}
$sessusername = $_SESSION["username"];
$sesspassword = $_SESSION["Password"];
$sessaccountnumber = $_SESSION["accountnumber"];
echo $sessusername."<br>";
echo $sesspassword."<br>";
echo $sessaccountnumber."<br>";

$sql1 = "SELECT * FROM bankcustmordetails WHERE  username= '$sessusername' AND userpassword='$sesspassword' ";


$result = $con->query($sql1);

$data = $result->fetch_object();
    
    // echo  $data->accountNumber;

?>

<body>
    <div id="bodyPaymentByAccount">
        <div id="error"></div>
        <!-- <header>rahul</header> -->
        <form action="pay_account.php" method="POST">
        <div id="PaymentDiv">
            <h1>Make a Payment</h1>
            <label for="fromAccount">From Account:</label>
            <input type="number" id="fromAccount" name="fromAccount" maxlength="15"
                placeholder=" Enter Account Number" value="<?php echo  $data->accountNumber;?>" readonly><br><br>
            <label for="toAccount">To Account:</label>
            <input type="number" id="toAccount" name="toAccount" maxlength="15"
                placeholder=" Enter Recipient Account Number"><br><br>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" maxlength="5" placeholder=" Enter Amount"><br><br>
            <button type="submit"  id="accountPay" name="accountPay">PAY</button>
        </div>
    </div>
    </form>

    <?php
if (isset($_POST['accountPay'])) {
    $fromAccount = $_POST['fromAccount'];
    $toAccount = $_POST['toAccount'];
    $amount = $_POST['amount'];
    $accNumberIsExitOrNot = $data->accountNumber;
// echo $accNumberIsExitOrNot."<br>";

    if ($fromAccount != $accNumberIsExitOrNot) {
        echo "Something Wrong Please Try again";
        exit;
    }


    $selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$fromAccount' ";
    $selectTableResult = $con->query($selectTable);
    $selectTabledata = $selectTableResult->fetch_object();


    $BankBalance = $selectTabledata->accountBalance;
echo $BankBalance;

    $updateBankBalance = $BankBalance - $amount;
    if ($BankBalance < $amount) {
        echo "you does not suffciant balance";
        exit;
        // return;
    }
    $InsertAmount = "UPDATE accountdebitcreditdetails SET accountBalance = '$updateBankBalance' WHERE accountdebitcreditdetails.accountNumber = '    $selectTabledata->accountNumber '";


    $con->query($InsertAmount);


    $paymentDetails = $selectTabledata->DebitAndCreditDetails;



    if ($paymentDetails != null) {
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $newTransaction = array(
            "type" => "Credit",
            "amount" => $amount,
            "bankbalance" => $updateBankBalance,
            "date" => $currentDate,
            "time" => $currentTime,
            "method" => "Account",
            "Payment_To" => $toAccount
        );

        // Add the new transaction to the existing transactions array
        $decodedPaymentDetails = json_decode($paymentDetails, true);
        $decodedPaymentDetails['transactions'][] = $newTransaction;
        $updatedPaymentDetails = json_encode($decodedPaymentDetails);

        $updateQuery = "UPDATE accountdebitcreditdetails
                    SET DebitAndCreditDetails = '$updatedPaymentDetails'
                    WHERE accountNumber = '$selectTabledata->accountNumber'";

        $con->query($updateQuery);

        echo "Payment succesfully";

        if ($con->query($selectTable) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $selectTable . "<br>" . $con->error;
        }

        // echo "<pre>";
        // print_r($decodedPaymentDetails);
        // echo "</pre>";
        // 
    }





    echo "<script defer>
        const errorDisplay = document.getElementById('error'); 
        errorDisplay.style.display = 'block';
        errorDisplay.style.color = 'green';
        errorDisplay.style.backgroundColor = '#4ac6439f';
        errorDisplay.style.border = 'green';
        errorDisplay.style.borderBottom = 'green 2px solid';
        errorDisplay.innerText = ' Payment successful!';

    

    var time = setInterval(() => {
        errorDisplay.style.display = 'none';
        
    }, 4000);   

        </script>";


}

$con->close();


?>


</body>

</html>