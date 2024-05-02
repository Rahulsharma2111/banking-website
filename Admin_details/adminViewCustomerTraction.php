<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View customer details</title>
</head>
<?php


$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
// include '../PHPauthemtication.php';
session_start();
 $sessAdminUsername=$_SESSION["sessAdminUsername"] ;
//  $sessAdminUseremail=$_SESSION["sessAdminUseremail"];
 $sessAdminPassword=$_SESSION["sessAdminPassword"] ;
if (!isset($sessAdminUsername) || !isset($sessAdminPassword)) {
    header("Location:./adminLogin.php");
    exit;
}



?>
<body>
    <div class="customer_details_form">

<form action="./adminViewCustomerTraction.php" method="post">
<div>
<label for="mobileNumber">Customer Mobile Number</label><br>
<input type="number" name="mobileNumber" id="mobileNumber" placeholder="Customer Mobile Number">
</div>
<br>
<div>
<label for="accountNumber">Customer Account Number</label><br>
<input type="number" name="accountNumber" id="accountNumber" placeholder="Customer Account Number">
</div>
<br>
<br>
<input type="submit" name="submitbtn" value="Submit">
</form>
    </div>

    <?php 
    if (isset($_POST['submitbtn'])) {
$mobileNumber=$_POST['mobileNumber'];
$accountNumber=$_POST['accountNumber'];
        if(empty ($mobileNumber)|| empty ($accountNumber)){
            echo "Please fill the all feilds";
            exit;
        }

        $sql="SELECT bankcustmordetails.firstname,bankcustmordetails.middlename,bankcustmordetails.lastname,bankcustmordetails.fathername,bankcustmordetails.username,bankcustmordetails.mobilenumber,bankcustmordetails.emailid,bankcustmordetails.city,bankcustmordetails.statee,bankcustmordetails.accountNumber, accountdebitcreditdetails.accountBalance,accountdebitcreditdetails.DebitAndCreditDetails FROM bankcustmordetails LEFT JOIN accountdebitcreditdetails ON bankcustmordetails.accountNumber = accountdebitcreditdetails.accountNumber WHERE bankcustmordetails.mobilenumber='$mobileNumber' AND bankcustmordetails.accountNumber='$accountNumber' ";
// echo $sql;
$result = $con->query($sql);
$data = $result->fetch_object();


$PaymentDetails = $data->DebitAndCreditDetails;
$decodedPaymentDetails = json_decode($PaymentDetails, true)['transactions'];

$fullName=$data->firstname.' '.$data->middlename.' '.$data->lastname;
// echo "<br>".$data->username."<br>";
// echo $data->emailid."<br>";
// echo $data->firstname."<br>";
// echo $data->fathername."<br>";
// echo $data->accountNumber."<br>";
// echo $data->accountBalance."<br>";
// 

// print_r(json_encode((array)$decodedPaymentDetails));

        ?>
        <style>
            .customer_details_form{
                display: none;
            }
        </style>
        <!-- customer details transaction -->

<div>
<div id="reciveMoney" name="reciveMoney"><?php echo $fullName;?> 
        <div id="AmountInBank">Your Bank Balance is <span id="amount" name="amount">
                    <?php echo $data->accountBalance ?>
                </span></div>
            <div id="reciveMoney" name="reciveMoney">
                Your Transcation Sheet
                <form action="adminViewCustomerTraction.php" method="GET">
                    <div id="searchDivElement">

                        <input type="search" id="searchAmoutInPassbook" name="search"
                            placeholder="search by Date/Amount " />
                        <input type="submit" value="Search" id="searchbtn" name="passbookSearchbtn">

                    </div>
                </form>
            </div>
    </div>

            <table id="table_enter" name="table_enter">
                <!-- <caption>Table Caption</caption> -->
                <thead>
                    <tr>
                        <th>Trancation Date</th>
                        <th>Trancation Time</th>
                        <th>Trancation Type</th>
                        <th>Trancation By</th>
                        <th>Payment To</th>
                        <th>Amount</th>
                        <th>Account Balance</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($decodedPaymentDetails as $transaction):
                        if (isset($_GET["passbookSearchbtn"])) {

                            $searchAmoutInPassbook = $_GET["search"];

                            if ($transaction['date'] == $searchAmoutInPassbook || $transaction['amount'] == $searchAmoutInPassbook) {
                                ?>
                                <tr>

                                    <td>
                                        <?php echo $transaction['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['method']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['Payment_To']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $transaction['bankbalance']; ?>
                                    </td>
                                </tr>
                            <?php }
                        }else{ ?>
                              <tr>

<td>
    <?php echo $transaction['date']; ?>
</td>
<td>
    <?php echo $transaction['time']; ?>
</td>
<td>
    <?php echo $transaction['type']; ?>
</td>
<td>
    <?php echo $transaction['method']; ?>
</td>
<td>
    <?php echo $transaction['Payment_To']; ?>
</td>
<td>
    <?php echo $transaction['amount']; ?>
</td>
<td>
    <?php echo $transaction['bankbalance']; ?>
</td>
</tr>
                    <?php } endforeach; ?>

                </tbody>
            </table>
            <br><br><br>
        </div>

        <?php
    }
    
    ?>
    <style>
          /* #amount {
        margin-left: 8px;
        font-weight: bold;

    }

    #searchAmoutInPassbook {
        height: 100%;
        position: relative;
        right: -18vw;
        padding: 1px;

    }

    #searchDivElement {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        width: 53vw;
        column-gap: 126px;
    }

    #searchbtn {
        width: 61px;
    }

    #reciveMoney {
        font-size: 24px;
        margin: 11px;
        text-align: center;
        font-weight: bolder;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;

    } */
    </style>
    <div>
       
</body>
</html>