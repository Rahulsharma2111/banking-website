console.log("Do not share your bank deatiles any anyone");




function submit_Data() {
    // Account holder name detiles

    // User First Name
    var Updatebtn = document.getElementById('submitbtn');
    var alertclickYes;
    Updatebtn.addEventListener('click', () => alertclickYes = alert("your account Open"),
        alertclickYes = true,
        // window.location.replace = "./index.html"
        window.location.href = "./index.html"
    )


    // alertaddeventRemove.addEventListener('click', () => 

    var userFirstName = document.getElementById("coustmor_name").value;
    console.log(userFirstName);
    localStorage.setItem('firstname', userFirstName);

    // User Middle Name
    var userMiddleName = document.getElementById("Middle_name").value;
    console.log(userMiddleName);
    localStorage.setItem('middlename', userMiddleName);

    // User Last Name
    var userLastName = document.getElementById("Last_name").value;
    console.log(userLastName);
    localStorage.setItem('lastname', userLastName);


    //Account holder name Parents details

    // user father name
    var fatherName = document.getElementById("fatherName").value;
    console.log(fatherName);
    localStorage.setItem('fathername', fatherName);

    // user mother name
    var motherName = document.getElementById("motherName").value;
    console.log(motherName);
    localStorage.setItem('motherName', motherName);


    // User mobile number
    var MobileNumber = document.getElementById("mobile_number").value;
    console.log(MobileNumber);
    localStorage.setItem('MobileNumber', MobileNumber);

    // User username
    var username = document.getElementById("username").value;
    console.log(username);
    localStorage.setItem('username', username);

    // User E-mail ID
    var emailId = document.getElementById("email_ID").value;
    console.log(emailId);
    localStorage.setItem('emailId', emailId);


    // User password
    var password = document.getElementById("password").value;
    console.log(password);
    localStorage.setItem('password', password);



    // User Temperey Address
    var Tempereyaddress = document.getElementById("Temperey_address").value;
    console.log(Tempereyaddress);
    localStorage.setItem('Tempereyaddress', Tempereyaddress);


    // User Permanant Address
    var Permanantaddress = document.getElementById("Permanant_address").value;
    console.log(Permanantaddress);
    localStorage.setItem('Permanantaddress', Permanantaddress);



    // User City name
    var city = document.getElementById("city").value;
    console.log(city);
    localStorage.setItem('city', city);


    // User pincode number
    var pincode = document.getElementById("pincode").value;
    console.log(pincode);
    localStorage.setItem('pincode', pincode);



    // User State name
    var state = document.getElementById("state").value;
    console.log(state);
    localStorage.setItem('state', state);



    // User Date of Birth
    var DOB = document.getElementById("DOB").value;
    console.log(DOB);
    localStorage.setItem('DOB', DOB);



    // User country name
    var country = document.getElementById("country_name").value;
    console.log(country);
    localStorage.setItem('country', country);



    // User Caste
    var CasteGroup = document.getElementsByName("Caste");
    for (let i = 0; i <= CasteGroup.length - 1; i++) {
        if (CasteGroup[i].checked) {
            // const Caste = ;
            localStorage.setItem('Caste', CasteGroup[i].value);
            break;
        }
    }


    // User Gender
    var genderGroup = document.getElementsByName("gender");
    for (let k = 0; k <= genderGroup.length - 1; k++) {
        if (genderGroup[k].checked) {
            // const Gender = ;
            localStorage.setItem('Gender', genderGroup[k].value);
            break;
        }
    }



    // User Aadhar Card number
    var aadharnumber = document.getElementById("aadharNumber").value;
    console.log(aadharnumber);
    localStorage.setItem('aadharnumber', aadharnumber);



    // User Pen Card Number
    var PenCard = document.getElementById("penCardNumber").value;
    console.log(PenCard);
    localStorage.setItem('PenCard', PenCard);


function images(your, Photo) {
    // this.yourPhoto=yourPhoto
    const reader = new FileReader();
    // Read the file as a data URL
    reader.readAsDataURL(your.files[0]);
    reader.onload = function () {
        const imageDataUrl = reader.result;
        // Save the image data URL to local storage
        localStorage.setItem(`${Photo}`, imageDataUrl);
}
};
// User Photo
const yourPhoto = document.getElementById('yourPhoto');
images(yourPhoto, "Photo");

// User DOB Certificate image
const DOBimage = document.getElementById('DOBimage');
images(DOBimage, "DOB_image");


// User marksheet image
const marksheetimage = document.getElementById('marksheetimage');
images(marksheetimage,"mark_sheet_image");

// User aadhar card front image
const aadhar_card_image = document.getElementById('aadharcardimage');
images(aadhar_card_image,"aadhar_card_image");

// User aadhar card back image
const aadhar_card_back_image = document.getElementById("aadharcardimageback");
images(aadhar_card_back_image,"aadhar_card_back_image");

// User pen card image
var pen_card_image = document.getElementById("pencardimage");
images(pen_card_image,"pen_card_image");

// User pen card back image
var pen_card_back_image = document.getElementById("pencardimageback");
images(pen_card_back_image,"pen_card_back_image");




    // User Photo
    // const yourPhoto = document.getElementById('yourPhoto');
    // // Create a FileReader to read the file
    // const reader0 = new FileReader();
    // // Read the file as a data URL
    // reader0.readAsDataURL(yourPhoto.files[0]);
    // reader0.onload = function () {
    //     const imageDataUrl = reader0.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('Photo', imageDataUrl);
    // };



    // User DOB Certificate image
  
    // const DOBimage = document.getElementById('DOBimage'); 
    // Create a FileReader to read the file
    // const reader1 = new FileReader();
    // // Read the file as a data URL
    // reader1.readAsDataURL(DOBimage.files[0]);
    // reader1.onload = function () {
    //     const imageDataUrlDOB_image = reader1.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('DOB_image', imageDataUrlDOB_image);
    // };



    // User marksheet image
    // var mark_sheet_image = document.getElementById("marksheetimage").value;
    // console.log(mark_sheet_image);
    // const marksheetimage = document.getElementById('marksheetimage');
    // // Create a FileReader to read the file
    // const reader2 = new FileReader();
    // // Read the file as a data URL
    // reader2.readAsDataURL(marksheetimage.files[0]);
    // reader2.onload = function () {
    //     const imageDataUrlmark_sheet_image = reader2.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('mark_sheet_image', imageDataUrlmark_sheet_image);
    // };



    // User aadhar card front image
   
    // const aadhar_card_image = document.getElementById('aadharcardimage');
    // // Create a FileReader to read the file
    // const reader3 = new FileReader();
    // // Read the file as a data URL
    // reader3.readAsDataURL(aadhar_card_image.files[0]);
    // reader3.onload = function () {
    //     const imageDataUrlaadhar_card_image = reader3.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('aadhar_card_image', imageDataUrlaadhar_card_image);
    // };




    // User aadhar card back image
    // const aadhar_card_back_image = document.getElementById("aadharcardimageback");
    // // Create a FileReader to read the file
    // const reader4 = new FileReader();
    // // Read the file as a data URL
    // reader4.readAsDataURL(aadhar_card_back_image.files[0]);
    // reader4.onload = function () {
    //     const imageDataUrlaadhar_card_back_image = reader4.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('aadhar_card_back_image', imageDataUrlaadhar_card_back_image);
    // };




    // User pen card image
    // var pen_card_image = document.getElementById("pencardimage");
    // // Create a FileReader to read the file
    // const reader5 = new FileReader();
    // // Read the file as a data URL
    // reader5.readAsDataURL(pen_card_image.files[0]);
    // reader5.onload = function () {
    //     const imageDataUrlpen_card_image = reader5.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('pen_card_image', imageDataUrlpen_card_image);
    // };



    // User pen card back image
    // var pen_card_back_image = document.getElementById("pencardimageback");
    // // Create a FileReader to read the file
    // const reader6 = new FileReader();
    // // Read the file as a data URL
    // reader6.readAsDataURL(pen_card_back_image.files[0]);
    // reader6.onload = function () {
    //     const imageDataUrlpen_card_back_image = reader6.result;
    //     // Save the image data URL to local storage
    //     localStorage.setItem('pen_card_back_image', imageDataUrlpen_card_back_image);
    // };


    // var MobileNumber = document.getElementById("mobile_number").value;
    var openAccountDate = new Date;
    var date = openAccountDate.getDate();
    var month = openAccountDate.getMonth();
    var year = openAccountDate.getFullYear();
    // var day=openAccountDate.getDay();

    const accountDate = date + "/" + month + "/" + year;
    // console.log(date, month, year);
    console.log(accountDate);
    localStorage.setItem('accountDate', accountDate);
    // sessionStorage.clear();

    // account number
    localStorage.setItem('accountNumber', 456789123456);

    // amount in bank balance
    localStorage.setItem('AccountBalance', 0);
    // return;
}
// export {addeventRemove};


