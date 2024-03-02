<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
</head>
<style>
    body {
        user-select: none;
    }

    #errorDisplay {
        width: 100vw;
        height: 50px;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0px;
        margin-top: 3px;
        background-color: #969292;
        color: #2196f3de;
        font-size: 36px;
        font-weight: bold;
        display: none;
    }
</style>
<link rel="stylesheet" href="open_acc_style_sheet.css">

<?php
session_start();
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'];
include $uploadDirectory . '/PHPauthemtication.php';
// echo $uploadDirectory;

if (!isset($_SESSION["username"]) || !isset($_SESSION["useremail"]) && !isset($_SESSION["Password"])) {
    header("Location: Signup.php");
    exit;
}
$username = $_SESSION["username"];
$useremail = $_SESSION["useremail"];
$userpassword = $_SESSION["Password"];
// include 'PHPauthemtication.php';
// session_start();
// if (!isset($_SESSION["username"]) || !isset($_SESSION["useremail"]) && !isset($_SESSION["Password"])) {
//     header("Location: Signup.php");
//     exit;
// }
// 
// $username = $_SESSION["username"];
// $useremail = $_SESSION["useremail"];
// $userpassword = $_SESSION["Password"];
// // echo $username;
// // echo $useremail;
// // echo $userpassword;

?>

<body>
    <div id="errorDisplay"></div>
    <p class=" main_header">Please fill the form with correct details</p>
    <div class="form_div">
        <form action="open_account.php" class="form_fill" method="POST" enctype="multipart/form-data">
            <div class="accoun_holder_name">

                <div class="first_name">
                    First Name : <input type="text" maxlength="10" placeholder=" Enter your first name"
                        class="coustmor_name" id="coustmor_name" name="firstname" required>
                </div>

                <div class="middle_name">
                    Middle Name : <input type="text" maxlength="10" placeholder=" Middle name is optional"
                        id="Middle_name" name="middlename" class="">
                </div>

                <div class="last_name">
                    Last Name : <input type="text" maxlength="10" placeholder=" Enter your Last name" required class=""
                        name="lastname" id="Last_name">
                </div>
            </div>

            <div class="parents_details">
                <div class="father_detail"> Father's Name : <input type="text" placeholder=" Enter your Father's name"
                        name="fathername" id="fatherName" required>
                </div>
                <div class="mother_detail">
                    Mother's Name : <input type="text" maxlength="16" placeholder=" Enter your Mother's name"
                        name="mothername" id="motherName" required>
                </div>
            </div>

            <div class="mobile_number">
                <div>
                    <label for="mobile_number"> Mobile Number : </label><input type="number" maxlength="10"
                        placeholder=" Enter your mobile name" id="mobile_number" name="mobilenumber" required>
                </div>
                <!-- <div id="usernameDiv">
                    <Label for="username">UserName :</Label>
                    <input type="text" placeholder="Please enter username" name="username" id="username">
                </div> -->

            </div>

 
       <!--    <div class="email_id">
                <div>
                    <label for="email_ID"> Email Id :</label> <input type="email" maxlength=""
                        placeholder="Enter your email id" id="email_ID" name="emailid" required>
                </div> -->
                <!-- <div id="passwordDiv">
                    <Label for="password">Password :</Label>
                    <input type="text" placeholder="Please enter password" name="password" id="password">
                </div> -->
            <!-- </div> -->

            <div class="address">
                Temperey Address : <input type="text" name="temperey_address" id="Temperey_address"
                    placeholder=" Temperey address is optional"></textarea>
                <br><br>
                <div id="Permanant">
                    Permanant Address : <input type="text" name="permanant_address" id="Permanant_address"
                        placeholder="Enter your permanat address" required></textarea>
                </div>
            </div>


            <div class="address_details">
                <div class="city"> City : <input type="text" maxlength="10" placeholder="Enter your city" id="city"
                        name="city" required>
                </div>

                <div class="pincode">
                    Pincode : <input type="number" maxlength="6" placeholder="Enter pincode" id="pincode" name="pincode"
                        required>

                </div>
                <div class="state">
                    State : <select name="state" id="state" required>
                        <option value="select state" selected="selected" disabled>select state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhaya Pradesh">Madhaya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarkhand">Uttarkhand</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Dehli">Dehli</option>
                        <option value="Ladakh">Ladakh</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value=""></option>
                        <option value=""></option>


                    </select>
                </div>
            </div>

            <div class="date">
                <div class="country">
                    <div class="dob">
                        Date of birth : <input type="date" placeholder=" Enter your DOB" name="DOB" id="DOB" required>
                    </div>
                    <div class="country_select">

                        Country : <select name="country_name" id="country_name" required>
                            <option value="select contry">select contry</option>
                            <option value="India">India</option>
                            <!-- <option value="Nepal">Nepal</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bangladesh">Bangladesh</option> 
                            -->
                        </select>
                    </div>
                </div>
                <br>
                <div class="caste_gender">
                    Caste :
                    <input type="radio" value="General" name="Caste" id="Cas"> General
                    <input type="radio" value="OBC" name="Caste"> OBC
                    <input type="radio" value="ST" name="Caste"> ST
                    <input type="radio" value="SC" name="Caste"> SC
                    <br><br>
                    Gender :
                    <input type="radio" value="Male" name="gender" class="gender"> Male
                    <input type="radio" value="Female" name="gender" class="gender"> Female
                    <input type="radio" value="Other" name="gender" class="gender"> Other
                </div>
            </div>


            <div class="card_number">

                <div class="aadhar_number">
                    Aadhar card Number : <input type="number" maxlength="12" placeholder=" Enter your aadhar number"
                        name="aadharNumber" id="aadharNumber" required>
                </div>

                <div class="pen_number">

                    Pen Card Number : <input type="text" maxlength="12" placeholder=" Enter your pen card number"
                        name="penCardNumber" id="penCardNumber" required>
                </div>
            </div>
            <br>

            <div class="upload_section">
                <div class="image_section_1">
                    <div class="image">

                        <!-- Your image upload -->

                        Please upload your Photo : <br>
                        <input type="file" name="Personalphoto" id="yourPhoto" required>
                        <img src="" alt="" id="profileimge" />

                    </div>

                    <br>

                    <!-- Birth certifiacte image -->

                    <div class="birth_cetifirate">
                        Please upload Birth Certificate : <br>
                        <input type="file" name="birth_certificate" id="DOBimage" required>
                        <img src="" alt="" id="birth_imge" />
                    </div>
                </div>
                <br>
                <div class="image_section_2">
                    <div class="marksheet">

                        <!-- 10 marksheet image upload -->

                        Please upload 10 Class Marksheet : <br>
                        <input type="file" name="marksheet10" id="marksheetimage" required>
                        <img src="" alt="" id="marksheet_image" />
                    </div>

                    <br>

                    <div class="aadhar_card">

                        <!-- aadhar card front image -->

                        Please upload Aadhar Card : <br>
                        <input type="file" id="aadharcardimage" name="aadhar_card_image_front" required>
                        <img src="" alt="" id="aadharcard_image" />

                        <!-- Please upload Aadhar Card back: -->

                        <br>
                        <input type="file" id="aadharcardimageback" name="aadhar_card_image_back" required>
                        <img src="" alt="" id="aadharcardback_image" />
                    </div>
                </div>
                <br>
                <div class="image_section_3">
                    <div class="pen_card">
                        Please upload Pen Card : <br>

                        <!-- Pen card front image upload -->

                        <input type="file" id="pencardimage" name="pen_card_image_front" required>
                        <img src="" alt="" id="imes" />

                        <!-- Pen Card back image:  -->
                        <br>
                        <div class="pencardback">
                            <input type="file" id="pencardimageback" name="pen_card_image_back" required>
                            <img src="" alt="" id="pencardback_image" />
                        </div>
                    </div>
                </div>
            </div>


            <!-- <img src="<script> </script>" alt=""> -->
            <br><br>
            <div class="btn">
                <input type="submit" value="Submit" onclick="submit_Data()" name="submit" id="submitbtn">



                <input type="Reset" id="resetbtn" onclick="window.document.location.reload()">

                <input type="button" value="Cancel" id="cancelbtn"
                    onclick="window.document.location.replace('index.php')">
            </div>
            <br><br>
        </form>
    </div>



</body>
<script>
    let errorDisplay = document.getElementById('errorDisplay');
    function errorHideTime() {
        // let hide = document.getElementById('errorDisplay');
        errorDisplay.style.display = "none";
    }
</script>

<?php
// $uploadDirectory = $_SERVER['DOCUMENT_ROOT'];
// include $uploadDirectory . '/PHPauthemtication.php';
// // echo $uploadDirectory;
// 
// if (!isset($_SESSION["username"]) || !isset($_SESSION["useremail"]) && !isset($_SESSION["Password"])) {
//     header("Location: Signup.php");
//     exit;
// }

// $username = $_SESSION["username"];
// $useremail = $_SESSION["useremail"];
// $userpassword = $_SESSION["Password"];
// echo $username;
// echo $useremail;
// echo $userpassword;


if (isset($_POST['submit'])) {

    // The data from Sign up page


    echo "everything is right";
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $mobilenumber = $_POST['mobilenumber'];
    // $username = $_POST['username'];
    $username = $_SESSION["username"];
    $emailid  = $_SESSION["useremail"];
    // $emailid = $_POST['emailid'];
    // $userpassword = $_POST['password'];
    $userpassword = $_SESSION["Password"];
    $temperey_address = $_POST['temperey_address'];
    $permanant_address = $_POST['permanant_address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $DOB = $_POST['DOB'];
    $country_name = $_POST['country_name'];
    $Caste = $_POST['Caste'];
    $gender = $_POST['gender'];
    $aadharNumber = $_POST['aadharNumber'];
    $penCardNumber = $_POST['penCardNumber'];

    if ($firstname == '' || $firstname == null) {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Enter Firstname';
setInterval(errorHideTime, 6000);
</script>";
        die();
    }
    if ($lastname == '' || $lastname == null) {
        echo "<script>
        errorDisplay.style.display = 'flex';
errorDisplay.innerHTML = 'Enter Firstname';
setInterval(errorHideTime, 6000);
</script>";
        die();
    }
    // if(){
// 
// }

    function accNumber($length = 11)
    {
        $accountnumber = '';
        for ($i = 0; $i < $length; $i++) {
            $accountnumber .= random_int(0, 9);

        }

        return $accountnumber;
    }

    $accountNumber = accNumber();


    // if (isset($_FILES["image"])) {
    $Personalphoto = $_FILES["Personalphoto"]["tmp_name"];
    $birth_certificate = $_FILES["birth_certificate"]["tmp_name"];
    $marksheet10 = $_FILES["marksheet10"]["tmp_name"];
    $aadhar_card_image_front = $_FILES["aadhar_card_image_front"]["tmp_name"];
    $aadhar_card_image_back = $_FILES["aadhar_card_image_back"]["tmp_name"];
    $pen_card_image_front = $_FILES["pen_card_image_front"]["tmp_name"];
    $pen_card_image_back = $_FILES["pen_card_image_back"]["tmp_name"];
    // $uer2 = $_FILES["photo2"]["tmp_name"];

    $makefolder_Name = $accountNumber;

    // $file_extension = strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION);
    $image_PersonalPhoto = $accountNumber . "_PersonalPhoto." . strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION));
    $image_class10Marksheet = $accountNumber . "_class10Marksheet." . strtolower(pathinfo($_FILES["marksheet10"]["name"], PATHINFO_EXTENSION));
    $image_birthCertificate = $accountNumber . "_birthCertificate." . strtolower(pathinfo($_FILES["birth_certificate"]["name"], PATHINFO_EXTENSION));
    $image_AadharcardFront = $accountNumber . "_AadharcardFront." . strtolower(pathinfo($_FILES["aadhar_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AadharcardBack = $accountNumber . "_AadharcardBack." . strtolower(pathinfo($_FILES["aadhar_card_image_back"]["name"], PATHINFO_EXTENSION));
    $image_PencardFront = $accountNumber . "_PencardFront." . strtolower(pathinfo($_FILES["pen_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_PencardBack = $accountNumber . "_PencardBack." . strtolower(pathinfo($_FILES["pen_card_image_back"]["name"], PATHINFO_EXTENSION));

    // create folder
    if (mkdir("$uploadDirectory/Bank_customer_image/" . $makefolder_Name)) {
        echo "folder is created";
    }
    move_uploaded_file($Personalphoto, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_PersonalPhoto);


    move_uploaded_file($marksheet10, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_class10Marksheet);

    move_uploaded_file($birth_certificate, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_birthCertificate);

    move_uploaded_file($aadhar_card_image_front, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_AadharcardFront);

    move_uploaded_file($aadhar_card_image_back, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_AadharcardBack);

    move_uploaded_file($pen_card_image_front, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_PencardFront);

    move_uploaded_file($pen_card_image_back, "$uploadDirectory/Bank_customer_image/" . $makefolder_Name . "/" . $image_PencardBack);

    echo "Image Upload successfully";
    //  echo $accountNumber;

    $sql1 = "SELECT * FROM bankcustmordetails WHERE  accountNumber= '$accountNumber'";
    $resultsql1 = $con->query($sql1);
    $data = $resultsql1->fetch_object();
    // 👀👀
    $dataAccountNumber = $data->accountNumber;
    // if( $data->accountNumber===null){ continue};

    // echo $accountNumber;

    // if ($data->accountNumber == $accountNumber) {
    if ($dataAccountNumber == $accountNumber) {
        die("Something Wrong Please try again");
        //         $accountNumber = accNumber();
//        
//         date_default_timezone_set('Asia/Kolkata');
//         $currentDateTime = date("Y-m-d H:i:s");
// 
//         $sql1 = "INSERT INTO bankcustmordetails (firstname, middlename, lastname, fathername, mothername, mobilenumber, emailid, username, userpassword, temparyaddress, premananetaddress, city, pincode, statee, DOB, country, caste, gender, aadharcardnumber, pencardnumber, accountNumber, personal_Image, class10Marksheet, birth_certificate, Aadharcard_Front, Aadharcard_Back, Pencard_Front, Pencard_Back, dateToCreateAccount, updateAccount ) VALUES ( '$firstname', '$middlename', '$lastname',' $fathername','$mothername','$mobilenumber','$emailid', '$username', '$userpassword', '$temperey_address', '$permanant_address', '$city', '$pincode', '$state', '$DOB', '$country_name', '$Caste', '$gender', '$aadharNumber', '$penCardNumber', '$accountNumber','$image_PersonalPhoto', '$image_class10Marksheet', '$image_birthCertificate', '$image_AadharcardFront', '$image_AadharcardBack', '$image_PencardFront','$image_PencardBack','$currentDateTime','$currentDateTime' )";
//         echo $sql1;
//         $con->query($sql1);
// 
//         // create and insert accout number in second table as a forgien key
//         $sql2 = "INSERT INTO accountdebitcreditdetails (accountNumber) VALUES ('$accountNumber')";
//         $con->query($sql2);
// 
// 
//         header("Location:chekStatusVerfiy.php");

    } else if ($data->accountNumber == '') {

        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date("Y-m-d H:i:s");

        $sql1 = "INSERT INTO bankcustmordetails (	firstname, middlename, lastname, fathername, mothername, mobilenumber, emailid, username, userpassword, temparyaddress, premananetaddress, city, pincode, statee, DOB, country, caste, gender, aadharcardnumber, pencardnumber,UPI_Id, accountNumber, personal_Image, class10Marksheet, birth_certificate, Aadharcard_Front, Aadharcard_Back, Pencard_Front, Pencard_Back, dateToCreateAccount, updateAccount ) VALUES ( '$firstname', '$middlename', '$lastname',' $fathername','$mothername','$mobilenumber','$emailid', '$username', '$userpassword', '$temperey_address', '$permanant_address', '$city', '$pincode', '$state', '$DOB', '$country_name', '$Caste', '$gender', '$aadharNumber', '$penCardNumber','', '$accountNumber','$image_PersonalPhoto', '$image_class10Marksheet', '$image_birthCertificate', '$image_AadharcardFront', '$image_AadharcardBack', '$image_PencardFront','$image_PencardBack','$currentDateTime','$currentDateTime' )";
        echo $sql1;
        $con->query($sql1);

        // create and insert accout number in second table as a forgien key
        $sql2 = "INSERT INTO accountdebitcreditdetails (accountNumber) VALUES ('$accountNumber')";
        $con->query($sql2);


        // if ($con->query($sql1) === TRUE) {
        //     echo "Record inserted successfully.";
        // } 
        // else {
        //     echo "Error: " . $sql1 . "<br>" . $con->error;
        //     echo "<br>";
        //     echo "Error: " . $sql2 . "<br>" . $con->error;
        // }



        header("Location: logIn.php");
    }


   
}
$con->close();

?>



<style>
    #profileimge {
        height: 98px;
        width: 112px;
        position: relative;
        top: -99px;
        left: 69px;
        /* border: black 2px solid; */
        display: none;
    }

    #birth_imge {
        height: 96px;
        width: 171px;
        position: relative;
        bottom: 98px;
        right: -39px;
        display: none;

    }

    #marksheet_image {
        height: 96px;
        width: 158px;
        position: relative;
        bottom: 98px;
        left: 39px;
        display: none;
    }

    #aadharcard_image {
        height: 96px;
        width: 171px;
        position: relative;
        bottom: 98px;
        right: -39px;
        display: none;
    }

    #aadharcardback_image {
        height: 96px;
        width: 171px;
        position: relative;
        bottom: 98px;
        right: -39px;
        display: none;
    }

    #imes {
        height: 96px;
        width: 168px;
        position: relative;
        bottom: 97px;
        left: 30px;
        /* background-color: black; */

        display: none;

    }

    #pencardback_image {
        height: 96px;
        width: 168px;
        position: relative;
        bottom: -2px;
        left: -220px;
        /* background-color: black; */
        display: none;

    }

    .pencardback {
        display: flex;
        position: relative;
        top: -1px;
    }
</style>



<script>

    function ImagePreview(ImageInput, imagesURL) {
        ImageInput.addEventListener("change", function (e) {
            imagesURL.src = URL.createObjectURL(e.target.files[0]);
            imagesURL.style.display = "block";
        });
    }
    // Your profile photo 
    var your_Photo = document.getElementById('yourPhoto');
    var profileimge = document.getElementById("profileimge");
    ImagePreview(your_Photo, profileimge);
    //     your_Photo.addEventListener("change", function (e) {
    //         profileimge.src = URL.createObjectURL(e.target.files[0]);
    //         profileimge.style.display = "block";
    //     });

    //  your birth certificate image
    var DOB_image = document.getElementById('DOBimage');
    var birth_document = document.getElementById("birth_imge");
    ImagePreview(DOB_image, birth_document);



    // Your 10 marksheet image
    var marksheetimage = document.getElementById('marksheetimage');
    var marksheet_image = document.getElementById("marksheet_image");
    ImagePreview(marksheetimage, marksheet_image);



    // Your Aahar card image
    var aadharcardimage = document.getElementById('aadharcardimage');
    var aadharcard_image = document.getElementById("aadharcard_image");
    ImagePreview(aadharcardimage, aadharcard_image);

    // Your Aahar card back image
    var aadharcardimageback = document.getElementById('aadharcardimageback');
    var aadharcardback_image = document.getElementById("aadharcardback_image");
    ImagePreview(aadharcardimageback, aadharcardback_image);

    // pen card image preview

    var pen_card_image = document.getElementById('pencardimage');
    var imes = document.getElementById("imes");
    ImagePreview(pen_card_image, imes);


    // pen card back image preview

    var pen_card_image_back = document.getElementById('pencardimageback');
    var pencardback_image = document.getElementById("pencardback_image");
    ImagePreview(pen_card_image_back, pencardback_image);

</script>



<!-- <script src="script.js"></script> -->



</html>