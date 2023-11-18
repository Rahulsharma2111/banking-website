<?php

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

?>