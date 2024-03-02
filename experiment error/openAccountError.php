<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
</head>

<!-- <link rel="stylesheet" href="open_acc_style_sheet.css"> -->

<body>
    <p class=" main_header">Please fill the form with correct details</p>
    <div class="form_div">
        <form action="" class="form_fill" method="POST">
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
                <div id="usernameDiv">
                    <Label for="username">UserName :</Label>
                    <input type="text" placeholder="Please enter username" name="username" id="username">
                </div>

            </div>


            <div class="email_id">
                <div>
                    <label for="email_ID"> Email Id :</label> <input type="email" maxlength=""
                        placeholder="Enter your email id" id="email_ID" name="emailid" required>
                </div>
                <div id="passwordDiv">
                    <Label for="password">Password :</Label>
                    <input type="text" placeholder="Please enter password" name="password" id="password">
                </div>
            </div>

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
                    Pincode : <input type="text" maxlength="6" placeholder="Enter pincode" id="pincode" name="pincode"
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
                        <input type="file" name="photo" id="yourPhoto" required>
                        <img src="" alt="" id="profileimge" />

                    </div>

                    <br>

                    <!-- Birth certifiacte image -->

                    <div class="birth_cetifirate">
                        Please upload Birth Certificate : <br>
                        <input type="file" name="birth certificate" id="DOBimage" required>
                        <img src="" alt="" id="birth_imge" />
                    </div>
                </div>
                <br>
                <div class="image_section_2">
                    <div class="marksheet">

                        <!-- 10 marksheet image upload -->

                        Please upload 10 Class Marksheet : <br>
                        <input type="file" name="marksheet" id="marksheetimage" required>
                        <img src="" alt="" id="marksheet_image" />
                    </div>

                    <br>

                    <div class="aadhar_card">

                        <!-- aadhar card front image -->

                        Please upload Aadhar Card : <br>
                        <input type="file" id="aadharcardimage" name="aadhar_card_image" required>
                        <img src="" alt="" id="aadharcard_image" />

                        <!-- Please upload Aadhar Card back: -->

                        <br>
                        <input type="file" id="aadharcardimageback" name="aadhar_card_image" required>
                        <img src="" alt="" id="aadharcardback_image" />
                    </div>
                </div>
                <br>
                <div class="image_section_3">
                    <div class="pen_card">
                        Please upload Pen Card : <br>

                        <!-- Pen card front image upload -->

                        <input type="file" id="pencardimage" name="pen_card_image" required>
                        <img src="" alt="" id="imes" />

                        <!-- Pen Card back image:  -->
                        <br>
                        <div class="pencardback">
                            <input type="file" id="pencardimageback" name="pen_card_image" required>
                            <img src="" alt="" id="pencardback_image" />
                        </div>
                    </div>
                </div>
            </div>


            <!-- <img src="<script> </script>" alt=""> -->
            <br><br>
            <div class="btn">
                <input type="submit" value="Submit" name="submit" id="submitbtn">
                <!-- onclick="submit_Data()"  -->


                <input type="Reset" id="resetbtn">

                <input type="button" value="Cancel" id="cancelbtn">
            </div>
            <br><br>
        </form>
    </div>

    <?php
    // echo "Name = " . $_POST['yourname'] . "<br/><br/>";
// echo "Class = " . $_POST['class'] . "<br/><br/>";
// echo "Contact number = " . $_POST['mobile'] . "<br><br>";
// echo "mobile = " . $_POST['DOB'] . "<br><br>";
   

 $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'apnabankdetails';
    $dbtable = 'bankcustmordetails';
    try {
        $con = new mysqli($localhost, $username, $password, $db, 3308);
        echo "connection successfully";
    } catch (Throwable $th) {
        echo "not connected" . $th;
        exit;
    }

    if (isset($_POST['submit'])) {

echo "everything is right";
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $fathername = $_POST['fathername'];
        $mothername = $_POST['mothername'];
        $mobilenumber = $_POST['mobilenumber'];
        $username = $_POST['username'];
        $emailid = $_POST['emailid'];
        $userpassword = $_POST['password'];
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
	

        $sql1 = "INSERT INTO bankcustmordetails (	firstname, middlename, lastname, fathername, mothername, mobilenumber, emailid, username, userpassword, temparyaddress, premananetaddress, city, pincode, statee, DOB, country, caste, gender, aadharcardnumber, pencardnumber) VALUES ( '$firstname', '$middlename', '$lastname',' $fathername','$mothername','$mobilenumber','$emailid', '$username', '$userpassword', '$temperey_address', '$permanant_address', '$city', '$pincode', '$state', '$DOB', '$country_name', '$Caste', '$gender', '$aadharNumber', '$penCardNumber')";
        echo $sql1;
        $con->query($sql1);

        if ($con->query($sql1) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $sql1 . "<br>" . $con->error;
        }


// $stmt = $con->prepare("INSERT INTO bankcustmordetails (firstname, middlename, lastname, fathername, mothername, mobilenumber, emailid, username, userpassword, temparyaddress, premananetaddress, city, pincode, state, DOB, country, caste, gender, aadharcardnumber, pencardnumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
// $stmt->bind_param("sssssissssssisssssis", $firstname, $middlename, $lastname, $fathername, $mothername, $mobilenumber, $emailid, $username, $userpassword, $temperey_address, $permanant_address, $city, $pincode, $state, $DOB, $country_name, $Caste, $gender, $aadharNumber, $penCardNumber);
// 
// if ($stmt->execute()) {
//     echo "Record inserted successfully.";
// } else {
//     echo "Error: " . $stmt->error;
// }

// $stmt->close();




        
        // $quer->close();
        // print_r($con->query($sql));
    
    }

    // if (isset($_GET['getdata'])) {
//     $sql1 = "SELECT * FROM stu_info";
//     $result = $con->query($sql1);
//     $ram = mysqli_fetch_array($result, MYSQLI_NUM);
// 
//     echo "<pre>";
//     print_r($ram);
//     // if ($result->num_rows > 0) {
//     //     while ($row = $result->fetch_assoc()) {
//     //         echo "Name = " . $row['namee'] . "<br/><br/>";
//     //         echo "Class = " . $row['class'] . "<br/><br/>";
//     //         echo "moblie = ". $row['mobile']."<br/><br/>";
//     //         echo "DOB = ". $row['DOB']."<br/><br/>";
//     // 
//     // }
//     // }
// }

    $con->close();

    ?>
</body>


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
    // 
    // 
    //     });

    //  your birth certificate image
    var DOB_image = document.getElementById('DOBimage');
    var birth_document = document.getElementById("birth_imge");
    ImagePreview(DOB_image, birth_document);
    //     DOB_image.addEventListener("change", function (e) {
    //         birth_document.src = URL.createObjectURL(e.target.files[0]);
    //         birth_document.style.display = "block";
    // 
    //     });


    // Your 10 marksheet image
    var marksheetimage = document.getElementById('marksheetimage');
    var marksheet_image = document.getElementById("marksheet_image");
    ImagePreview(marksheetimage, marksheet_image);
    //     marksheetimage.addEventListener("change", function (e) {
    //         marksheet_image.src = URL.createObjectURL(e.target.files[0]);
    //         marksheet_image.style.display = "block";
    // 
    //     });


    // Your Aahar card image
    var aadharcardimage = document.getElementById('aadharcardimage');
    var aadharcard_image = document.getElementById("aadharcard_image");
    ImagePreview(aadharcardimage, aadharcard_image);
    //     aadharcardimage.addEventListener("change", function (e) {
    //         aadharcard_image.src = URL.createObjectURL(e.target.files[0]);
    //         aadharcard_image.style.display = "block";
    // 
    //     });

    // Your Aahar card back image
    var aadharcardimageback = document.getElementById('aadharcardimageback');
    var aadharcardback_image = document.getElementById("aadharcardback_image");
    ImagePreview(aadharcardimageback, aadharcardback_image);
    // aadharcardimageback.addEventListener("change", function (e) {
    //     aadharcardback_image.src = URL.createObjectURL(e.target.files[0]);
    //     aadharcardback_image.style.display = "block";
    // });

    // pen card image preview

    var pen_card_image = document.getElementById('pencardimage');
    var imes = document.getElementById("imes");
    ImagePreview(pen_card_image, imes);
    // pen_card_image.addEventListener("change", function (e) {
    //     imes.src = URL.createObjectURL(e.target.files[0]);
    //     imes.style.display = "block";
    // });

    // pen card back image preview

    var pen_card_image_back = document.getElementById('pencardimageback');
    var pencardback_image = document.getElementById("pencardback_image");
    ImagePreview(pen_card_image_back, pencardback_image);
    // pen_card_image_back.addEventListener("change", function (e) {
    //     pencardback_image.src = URL.createObjectURL(e.target.files[0]);
    //     pencardback_image.style.display = "block";
    // });




</script>


<script defer>
    //  import {addeventRemove as removealert} from "./script.js";

    var namee = localStorage.getItem('firstname');

    if (localStorage.getItem('MobileNumber') == null && localStorage.getItem('MobileNumber') == undefined && localStorage.getItem('emailId') == null && localStorage.getItem('username') == null) {
        // if (localStorage === null) {
        // window.location.href = "http://127.0.0.1:5500/open_account.html";
        // localStorage.clear();
        // }
        console.log("some thing wrong");

    }
    else {
        var Updatebtn = document.getElementById('submitbtn');
        // Updatebtn.setAttribute.value = "Update";
        Updatebtn.value = "Update";
        Updatebtn.style.position = 'relative';
        Updatebtn.style.left = '318px';
        //  Updatebtn.removeEventListener('click',removealert);
        // Updatebtn.style.alignitems='center';
        // Updatebtn.style.justifycontent=' center';
        document.getElementById('resetbtn').style.display = "none";
        document.getElementById('cancelbtn').style.display = "none";

        // OTP Verifcation process by prompt
        Updatebtn.addEventListener('click', function OTP() {

            var OtpVerfication = Math.trunc(Math.random() * 999999);
            var UserEnterOTP = prompt(`Please enter OTP is ${OtpVerfication}`);
            if (UserEnterOTP == OtpVerfication) {
                alert("Your Profile is Updated");


                var openAccountDate = new Date;
                var date = openAccountDate.getDate();
                var month = openAccountDate.getMonth();
                var year = openAccountDate.getFullYear();
                // var day=openAccountDate.getDay();

                const accountDateUpdate = date + "/" + month + "/" + year;
                // console.log(date, month, year);
                console.log(accountDateUpdate);
                localStorage.setItem('accountDateUpdate', accountDateUpdate);

            } else {
                alert(" Please enter corret OTP");

            }
        });



        console.log("hello");
        var firstname = localStorage.getItem('firstname');
        document.getElementById("coustmor_name").value = firstname;

        var middlename = localStorage.getItem('middlename');
        document.getElementById("Middle_name").value = middlename;

        var lastname = localStorage.getItem('lastname');
        document.getElementById("Last_name").value = lastname;


        var fathername = localStorage.getItem('fathername');
        document.getElementById("fatherName").value = fathername;


        var motherName = localStorage.getItem('motherName');
        document.getElementById("motherName").value = motherName;


        var MobileNumber = localStorage.getItem('MobileNumber');
        document.getElementById("mobile_number").value = MobileNumber;

        var username = localStorage.getItem('username');
        document.getElementById("username").value = username;


        var emailId = localStorage.getItem('emailId');
        document.getElementById("email_ID").value = emailId;

        var password = localStorage.getItem('password');
        document.getElementById("password").value = password;

        var Tempereyaddress = localStorage.getItem('Tempereyaddress');
        document.getElementById("Temperey_address").value = Tempereyaddress;


        var Permanantaddress = localStorage.getItem('Permanantaddress');
        document.getElementById("Permanant_address").value = Permanantaddress;


        var city = localStorage.getItem('city');
        document.getElementById("city").value = city;


        var pincode = localStorage.getItem('pincode');
        document.getElementById("pincode").value = pincode;


        var state = localStorage.getItem('state');
        document.getElementById("state").value = state;


        var DOB = localStorage.getItem('DOB');
        document.getElementById("DOB").value = DOB;


        var country = localStorage.getItem('country');
        document.getElementById("country_name").value = country;


        var CasteGroup = document.getElementsByName("Caste");
        var localCaste = localStorage.getItem('Caste');
        for (let i = 0; i <= CasteGroup.length - 1; i++) {
            if (localCaste == CasteGroup[i].value) {
                // CasteGroup[i].checked = localCaste;
                CasteGroup[i].checked = true;
                break;
            }

        }



        var GenderGroup = document.getElementsByName("gender");
        var localGender = localStorage.getItem('Gender');
        for (let i = 0; i <= GenderGroup.length - 1; i++) {
            if (localGender == GenderGroup[i].value) {
                GenderGroup[i].checked = true;
                break;
            }
        }



        var aadharnumber = localStorage.getItem('aadharnumber');
        document.getElementById("aadharNumber").value = aadharnumber;


        var PenCard = localStorage.getItem('PenCard');
        document.getElementById("penCardNumber").value = PenCard;


        var Photo = localStorage.getItem('Photo');
        document.getElementById("yourPhoto").value = Photo;

        // (profileimge) image preview
        // var your_Photo = document.getElementById('yourPhoto');
        // your_Photo.addEventListener("change", function () {

        // var profileimge = document.getElementById("profileimge");
        // profileimge.src = '.\phone images\1.jpg';
        // // profileimge.src =  localStorage.getItem('Photo');
        // profileimge.style.display = "block";
        // profileimge.style.width = "250px";


        // Get the image data URL from local storage
        // const imageDataUrl = localStorage.getItem('Photo');

        // // Create an <img> element
        // // const imgElement = document.createElement('img');
        // var profileimge = document.getElementById("profileimge");
        // // Set the src attribute of the <img> element to the image data URL
        // // imgElement.src = imageDataUrl;
        //  profileimge.src = imageDataUrl;
        // // Append the <img> element to a container in your HTML
        // // const container = document.getElementById('imageContainer');
        // // container.appendChild(imgElement);
        //     // });


        //   Please upload your Photo : <br>
        //   <input type="file" name="photo" id="yourPhoto" required>
        //   <img src="" alt="" id="profileimge" />


        var DOB_image = localStorage.getItem('DOB_image');
        document.getElementById("DOBimage").value = DOB_image;
        // (birth_imge) image preview



        var mark_sheet_image = localStorage.getItem('mark_sheet_image');
        document.getElementById("marksheetimage").value = mark_sheet_image;
        // (marksheet_image) image preview


        var aadhar_card_image = localStorage.getItem('aadhar_card_image');
        document.getElementById("aadharcardimage").value = aadhar_card_image;
        // (aadharcard_image) image preview


        var aadhar_card_back_image = localStorage.getItem('aadhar_card_back_image');
        document.getElementById("aadharcardimageback").value = aadhar_card_back_image;
        // (aadharcardback_image) image preview


        var pen_card_image = localStorage.getItem('pen_card_image');
        document.getElementById("pencardimage").value = pen_card_image;
        // (imes) image preview


        var pen_card_back_image = localStorage.getItem('pen_card_back_image');
        document.getElementById("pencardimageback").value = pen_card_back_image;
        // (pencardback_image) image preview


        // 
        //         document.querySelector ("#myFileInput").addEventListener("change", function () {
        //     const reader = new FileReader();
        //     reader.addEventListener("load", () => {
        //         console.log(reader.result);
        //     });
        //     reader.readAsDataURL (this.files[0]);
        // });



        // document.addEventListener("DOMContentLoaded", () => {
        //     const recentImageDataUrl = localStorage.getItem("recent-image");
        //     if (recentImageDataUrl) {
        //         document.querySelector ("#imgPreview").setAttribute("src", recentImageDataUrl);
        //     }
        // });
    }

</script>

<!-- <script src="script.js"></script> -->



</html>