<?php 
header('Content-type:application/json');
header('Access-Control-Allow-Origin:*');


$localhost = 'localhost';
 $username = 'root';
 $password = '';
 $db = 'apnabankdetails';
 $dbtable = 'bankcustmordetails';
 try {
     $con = new mysqli($localhost, $username, $password, $db, 3308);
    //  echo "connection successfully";
 } catch (Throwable $th) {
     echo "not connected" . $th;
     exit;
 }

// include 'C:\xampp\htdocs\bank website using php\PHPauthemtication.php';

// $sql="SELECT firstname,middlename,lastname,mobilenumber,accountNumber FROM bankcustmordetails WHERE username='Rahul@2111' ";
$sql="SELECT bankcustmordetails.firstname,bankcustmordetails.middlename,bankcustmordetails.lastname,bankcustmordetails.mobilenumber,bankcustmordetails.accountNumber, accountdebitcreditdetails.accountBalance FROM bankcustmordetails LEFT JOIN accountdebitcreditdetails ON bankcustmordetails.accountNumber = accountdebitcreditdetails.accountNumber WHERE username='Rahul@2111' ";
$result=$con->query($sql);
$data=mysqli_fetch_assoc($result);
// echo "<pre>";
echo json_encode($data);
// $JSON=json_decode($data);

?>
