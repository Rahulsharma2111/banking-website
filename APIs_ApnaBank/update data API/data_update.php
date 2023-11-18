<?php
$localhost = 'localhost';
 $usernameDatabase = 'root';
 $password = '';
 $db = 'apnabankdetails';
 $dbtable = 'bankcustmordetails';
 try {
     $con = new mysqli($localhost, $usernameDatabase, $password, $db, 3308);
 } catch (Throwable $th) {
     echo "not connected" . $th;
     exit;
 }

header('Content-type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, x-requested-with');

$data=json_decode(file_get_contents("php://input"),true);


if (empty($data) && !isset($data['username'])) {
    echo "Enter Username".$con->error;
}
if (empty($data) && !isset($data['mobilenumber'])) {
    echo "Enter Mobile number".$con->error;
}
if (empty($data) && !isset($data['accountnumber'])) {
    echo "Enter Account number".$con->error;
}


$username_update=$data['username'];
$MobileNumber=$data['mobilenumber'];
$AccountNumber=$data['accountnumber'];


$sql="UPDATE  bankcustmordetails SET username='$username_update', mobilenumber='$MobileNumber' WHERE accountNumber='$AccountNumber'";
// $result=$con->query($sql);
if ($con->query($sql)===true) {
    // $data=mysqli_fetch_assoc($result);
 echo json_encode(array("message"=>"update","status"=>"true","error"=>$con->error));
}else{
    echo json_encode(array("message"=>"not updated","status"=>"false","error"=>$con->error));
}



?>