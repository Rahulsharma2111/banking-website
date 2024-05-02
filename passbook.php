<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passbook</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* font-size: 20px; */
        /* font-family: serif, sans-serif; */
    }

    #contanier {
        padding: 2%;
    }

    header {
        font-family: 500;
        font-size: 35px;
        background-color: rgb(133, 188, 236);
        border-radius: 20px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffff;
    }

    #passbook {
        min-height: 90vh;
        /* min-height: 524px; */
        height: auto;
        background-color: rgba(101, 185, 212, 0.911);
        margin-top: 1em;

        border-radius: 20px;
    }

    #AmountInBank {
        padding: 2em;
        padding-bottom: 10px;
        font-size: 25px;
        font-weight: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #amount {
        margin-left: 8px;
        /* color: rgb(36, 30, 30); */
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

    }

    #table_enter {
        margin-left: 1%;
        width: 98%;
        text-align: center;
        border-collapse: collapse;
        border: 2px solid black;
        /* margin-bottom: 19px; */
    }

    td,
    th {
        border: 1px solid black;
        padding: 2px;
    }

    @media only screen and (min-width:50px) and (max-width:361px) {
        #table_enter {
            font-size: 6px;
        }

        #reciveMoney {
            font-size: 14px;
            margin-top: -9px;
        }

        #AmountInBank {
            font-size: 15px;
            padding: 1em;
        }

        header {
            font-size: 26px;
            height: 37px;

        }

        #passbook {
            margin-top: 0.5em;
        }

    }

    @media only screen and (min-width:361px) and (max-width:545px) {
        #table_enter {
            font-size: 10px;
        }

        #reciveMoney {
            font-size: 18px;
            margin-top: -9px;
        }

        #AmountInBank {
            font-size: 19px;
            padding: 1em;
        }

        header {
            font-size: 26px;
            height: 37px;

        }

        #passbook {
            margin-top: 0.5em;
        }
    }
</style>
<?php

require 'PHPauthemtication.php';
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: logIn.php");
    die();
}
$sessusername = $_SESSION["username"];
$sesspassword = $_SESSION["Password"];
$sessaccountnumber = $_SESSION["accountnumber"];

$selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$sessaccountnumber' ";
// $selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$sessaccountnumber' ORDER BY  ASC  ";

$selectTableResult = $con->query($selectTable);
$selectTabledata = $selectTableResult->fetch_object();


$decodedPaymentDetails = $selectTabledata->DebitAndCreditDetails;
// echo $selectTabledata->DebitAndCreditDetails;

$decodedPaymentDetails = json_decode($decodedPaymentDetails, true)['transactions'];

 ?>


<body>
    <div id="contanier">
        <header id="header">Your Passbook</header>
        <div id="passbook">
            <div id="AmountInBank">Your Bank Balance is <span id="amount" name="amount">
                    <?php echo $selectTabledata->accountBalance ?>
                </span></div>
            <div id="reciveMoney" name="reciveMoney">
                Your Transcation Sheet
                <form action="passbook.php" method="GET">
                    <div id="searchDivElement">

                        <input type="search" id="searchAmoutInPassbook" name="search"
                            placeholder="search by Date/Amount " />
                        <input type="submit" value="Search" id="searchbtn" name="searchbtn">

                    </div>
                </form>
            </div>
            <!-- <div id="sendMoney">Send Money is here</div> -->

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
                    <?php
                    
                    if ($decodedPaymentDetails==null) {
                        die;
                        // return;
                    }
                    
                    foreach ($decodedPaymentDetails as $transaction):
                        if (isset($_GET["searchbtn"])) {

                            $searchAmoutInPassbook = $_GET["search"];

//                             if ($transaction['date'] != $searchAmoutInPassbook || $transaction['amount'] != $searchAmoutInPassbook) {
//                                 echo "<tr><td><b>No Trancation Found !</b></td></tr>";
// 
//                             }
//                             if (!$transaction['date']  || !$transaction['amount'] ) {
//                                 echo "<tr><td><b>No Trancation Found !</b></td></tr>";
// 
//                             }
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

                        } else { 
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
                        <?php } ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <br><br><br>
            <!-- <div ></div> -->
        </div>

        <!-- <footer id="footer"></footer> -->
    </div>
</body>

<!-- <script>
    document.getElementById('searchAmoutInPassbook').value;

</script> -->

</html>









<!-- 


{"transactions": [{"tranNo.":1,type":"debit", "amount":0, "bankbalance":0, "date":"2023-08-17", "time":"10:30 AM", "method":"no", "Payment_To":"self" } ]}

 -->