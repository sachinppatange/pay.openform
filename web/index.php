<?php
session_start();
include_once '../config/config.php';
include_once '../controller/ctrlgetStudDetails.php';
$studid = $_GET['studmaxid'];
//if($studid!=""){
$stud = getStudentByStudId($studid);
//print_r($stud);
// Include the Razorpay PHP library
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Initialize Razorpay with your key and secret
$api_key = 'rzp_live_dfhtnkmedcTWBN';
$api_secret = 'jzFO7kSdSOXJ7RLF7JeuyRoj';
if ($stud['amount'] != "") {
    $amount = $stud['amount'] * 100;
} else {
    $amount = 100;
}

$api = new Api($api_key, $api_secret);
// Create an order
$order = $api->order->create([
    'amount' => $amount, // amount in paise (100 paise = 1 rupee)
    'currency' => 'INR',
    'receipt' => 'order_receipt_1001'
]);
// Get the order ID
$order_id = $order->id;

// Set your callback URL
$callback_url = "https://registration.sainikividyalayatuljapur.in/web/paymentrecipt.php?chk=success";

// Include Razorpay Checkout.js library
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';


echo '<script>
    function startPayment() {
		
    var options = {
        key: "' . $api_key . '",
        amount: ' . $order->amount . ',
        currency: "' . $order->currency . '",
        name: "' . $stud['surname'] . ' ' . $stud['firstname'] . '",
        description: "Student Registration Fee",
        image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
        order_id: "' . $order_id . '",
        theme: { color: "#738276" },
        handler: function (response) {
            // Payment success, redirect to portal
            window.location.href = "./portal.php?chk=success&studid=' . $stud['stud_id'] . '";
        },
        prefill: {
            name: "' . $stud['surname'] . ' ' . $stud['firstname'] . '",
            email: "' . $stud['email'] . '",
            contact: "' . $stud['whatsappno'] . '"
        },
        notes: {
            address: "Customer Address"
        },
        modal: {
            escape: false
        }
    };
    var rzp = new Razorpay(options);
    rzp.open();
}

</script>';
//}
?>

<?php

// print_r($_SESSION);

?>
<script>
    // Retrieve the PHP session variable and embed it into JavaScript
    <?php if (isset($_SESSION['message'])): ?>
        var message = "<?php echo $_SESSION['message']; ?>";
        alert(message);
    <?php endif; ?>
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(getcompany(), ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="icon" href="../assets/img/logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        .size {
            font-size: 12px;
        }

        .rule li {
            font-size: 13px;
            ;
        }

        .error {
            font-size: 12px;
            color: red;
        }

        .card {
            border-radius: 12px;
        }

        .form-group {
            padding: 5px;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-check-label {
            font-size: 14px;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }

        .file-input-wrapper {
            position: relative;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-wrapper label {
            background-color: #f8f9fc;
            padding: 8px;
            border-radius: 8px;
            border: 2px dashed #4e73df;
            display: inline-block;
            width: 100%;
            text-align: center;
            font-size: 14px;
            color: #4e73df;
            cursor: pointer;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Space between images */
        }

        .image-container img {
            width: 25%;
            height: auto;
        }
    </style>
    <script>
        function showpayment(studid) {
            if (studid != "") {
                startPayment();
                // alert('hiiii');
              //   window.location.href="./portal.php";
            }
        }
    </script>
</head>
<!-- GOVINDLAL KANHAIYALAL JOSHI (NIGHT) COMMERCE COLLEGE, LATUR -->

<body style="background-color:#87CEFA" onload="showpayment('<?php echo $_GET['studmaxid']; ?>')">
    <div class="container">
        <div class="card p-4 m-3">
            <div class="row">
                <p style="color:red; font-size:14px;"><b>फॉर्म भरण्याआधी माहिती पत्रक काळजीपूर्वक वाचा. त्या शिवाय फॉर्म
                        भरू नका. &nbsp; &nbsp;PLEASE READ INFORMATION BULLETIN BEFORE FILLING THE REGISTRATION FORM.</b>
                </p>
                <div class="col-md-6 mt-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h3 class="text-primary">Registration Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="../controller/ctrlStudRegistration.php" method="post"
                                enctype="multipart/form-data">
                                <!-- Surname -->
                                <div class="form-group">
                                    <label for="surname"><i class="fas fa-user"></i> Surname (आडनाव)</label>
                                    <input type="text" class="form-control" name="surname" id="surname"
                                        placeholder="Enter surname" required>
                                </div>

                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="firstname"><i class="fas fa-user"></i> First Name (पहिले नाव)</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        placeholder="Enter first name" required>
                                </div>

                                <!-- Father's Name -->
                                <div class="form-group">
                                    <label for="fathername"><i class="fas fa-user"></i> Father's Name (वडिलांचे
                                        नाव)</label>
                                    <input type="text" class="form-control" name="fathername" id="fathername"
                                        placeholder="Enter father's name" required>
                                </div>

                                <!-- Mother's Name -->
                                <div class="form-group">
                                    <label for="mothername"><i class="fas fa-user"></i> Mother's Name (आईचे नाव)</label>
                                    <input type="text" class="form-control" name="mothername" id="mothername"
                                        placeholder="Enter mother's name" required>
                                </div>

                                <!-- Email ID -->
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope"></i> Email ID (ईमेल आयडी)</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter email" required>
                                </div>

                                <!-- WhatsApp Number -->
                                <div class="form-group">
                                    <?php if ($_SESSION['error1'] != "") {
                                        echo '<h4 style="color:red;">' . $_SESSION['error1'] . '</h4>';
                                    } ?>
                                    <label for="whatsapp"><i class="fas fa-phone-alt"></i> Whats App Number (व्हॉट्सअॅप
                                        क्रमांक)</label>

                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                        placeholder="Enter WhatsApp number" maxlength="10"
                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                        required>
                                </div>

                                <!-- Alternate Number -->
                                <div class="form-group">
                                    <label for="alternateno"><i class="fas fa-phone-alt"></i> Alternate Number (पर्यायी
                                        क्रमांक)</label>
                                    <input type="text" class="form-control" name="alternateno" id="alternateno"
                                        placeholder="Enter alternate number" maxlength="10"
                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                        required>
                                </div>

                                <!-- Aadhar Number -->
                                <div class="form-group">
                                    <label for="aadhar"><i class="fas fa-id-card"></i> Aadhar Number (आधार
                                        क्रमांक)</label>
                                    <input type="text" class="form-control" name="aadhar" id="aadhar"
                                        placeholder="Enter Aadhar number" maxlength="12"
                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                        required>
                                </div>

                                <!-- Course (Radio Buttons) -->
                                <div class="form-group">
                                    <label>Course (कोर्स)</label>
                                    <select class="form-control" name="course" id="course6"
                                        onchange="showdata(this.value)" required>
                                        <option value="">Select Course</option>
                                        <option value="6th">6th (६ वी)</option>
                                        <option value="11th">11th (११ वी)</option>
                                    </select>
                                </div>
                                <div id="show6">
                                    <!-- Date of Birth -->
                                    <div class="form-group">
                                        <label for="dob"><i class="fas fa-calendar-alt"></i> Date of Birth
                                            (जन्मतारीख)</label>
                                        <input type="date" class="form-control" name="dob" id="dob" min="2013-01-01"
                                            max="2015-12-31" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="adcategory"><i class="fas fa-book"></i> Admission Category.
                                            (प्रवेशा चा प्रवर्ग)</label>
                                        <select class="form-control" name="adcategory" id="adcategory" required>
                                            <option value="Open">Open (खुला)</option>
                                            <option value="OBC">OBC (इतर मागास प्रवर्ग )</option>
                                            <option value="SEBC">SEBC (सामाजिक आणि शैक्षणिकदृष्ट्या मागास)</option>
                                            <option value="SC">SC (अनुसूचित जाती )</option>
                                            <option value="ST">ST (अनुसूचित जमात )</option>
                                            <option value="VJ">VJ (विमुक्त जाती )</option>
                                            <option value="NT-B">NT-B (भटक्या जमाती - ब )</option>
                                            <option value="NT-C">NT-C (भटक्या जमाती - क )</option>
                                            <option value="NT-D">NT-D (भटक्या जमाती - ड )</option>
                                            <option value="SBC">SBC (विशेष मागास प्रवर्ग )</option>
                                        </select>
                                    </div>

                                    <!-- Category (Radio Buttons) -->
                                    <div class="form-group">
                                        <label>Fees Category (फी श्रेणी)</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category"
                                                id="categoryGeneral" value="A) Open/OBC/SEBC."
                                                onclick="getvalue('354')" required>
                                            <label class="form-check-label" for="categoryGeneral">
                                                A) Open/OBC/SEBC. = Rs 300 + Rs 54 (GST 18%) = Rs 354/- (सामान्य आणि
                                                ओबीसी = ३०० रुपये + ५४ रुपये (जीएसटी १८%) एकूण ३५४/- रुपये)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="categorySC"
                                                value="B) SC/ST/VJ NT/SBC" onclick="getvalue('236')" required>
                                            <label class="form-check-label" for="categorySC">
                                                B) SC/ST/VJ NT/SBC = Rs 200 + Rs 36 (GST 18%) = Rs 236/-
                                                (एससी/एसटी/व्हीजे एनटी/एसबीसी = २०० रुपये + ३६ रुपये (जीएसटी १८%) =
                                                २३६/- रुपये)
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address"><i class="fas fa-map-marker-alt"></i> Address
                                            (पत्ता)</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Enter address" required>
                                    </div>

                                    <!-- Present School Name -->
                                    <div class="form-group">
                                        <label for="schoolname"><i class="fas fa-school"></i> Present School Name (सध्या
                                            शिकत असलेल्या शाळेचे नाव)</label>
                                        <input type="text" class="form-control" name="schoolname" id="schoolname"
                                            placeholder="Enter present school name" required>
                                    </div>

                                    <!-- Previous Standard -->
                                    <div class="form-group">
                                        <label for="previousstd"><i class="fas fa-book"></i> Previous Std. (मागील
                                            इयत्ता)</label>
                                        <select class="form-control" name="previousstd" id="previousstd" required>
                                            <option value="5th">5th (५ वी)</option>
                                            <option value="6th">6th (६ वी)</option>
                                        </select>
                                    </div>

                                    <!-- Grade Obtained -->
                                    <div class="form-group">
                                        <label for="grade"><i class="fas fa-star"></i> Grade Obtained in Previous Std.
                                            (मागील इयत्तेमध्ये प्राप्त केलेली श्रेणी)</label>
                                        <select class="form-control" name="grade" id="grade" required>
                                            <option value="5th">Select Grade(श्रेणी )</option>
                                            <option value="A1">A1 (अ1) </option>
                                            <option value="A2">A2 (अ2)</option>
                                            <option value="B1">B1 (ब1)</option>
                                            <option value="B2">B2 (ब2)</option>
                                            <option value="C1">C1 (क1)</option>
                                            <option value="C2">C2 (क2)</option>
                                        </select>
                                    </div>

                                    <!-- Board (Dropdown) -->
                                    <div class="form-group">
                                        <label for="board"><i class="fas fa-list"></i> Board (बोर्ड)</label>
                                        <select class="form-control" id="board" name="board" required>
                                            <option value="Maharashtra State Board">Maharashtra State Board (महाराष्ट्र
                                                राज्य बोर्ड)</option>
                                            <option value="CBSE">CBSE (सीबीएसई)</option>
                                            <option value="ICSE">ICSE (आयसीएसई)</option>
                                            <option value="Other">Other (इतर)</option>
                                        </select>
                                    </div>

                                    <!-- Preferred Language for Exam -->
                                    <div class="form-group">
                                        <label>Preferred Language for Exam (परीक्षेसाठी पसंतीची भाषा)</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="languageEnglish" value="english" required>
                                            <label class="form-check-label" for="languageEnglish">
                                                English (इंग्रजी)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="languageMarathi" value="marathi" required>
                                            <label class="form-check-label" for="languageMarathi">
                                                Marathi (मराठी)
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Exam Centre Choice -->
                                    <div class="form-group">
                                        <label>Exam Centre Choice (परीक्षा केंद्राची निवड)</label>
                                        <!--<div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Tuljapur"
                                                name="centre1" id="centreTuljapur" checked disabled>
                                            <label class="form-check-label" for="centreTuljapur">
                                                Tuljapur
                                            </label>
                                        </div>-->
                                        <div class="form-check">
                                            <label>Select Preference ( प्राधान्य)</label>
                                            <select class="form-control" name="firstcenter">
											<option value="">Select</option>
											<option value="Tuljapur">Tuljapur (तुळजापूर )</option>
                                                <option value="Latur">Latur (लातूर )</option>
                                                <option value="Solapur">Solapur (सोलापूर )</option>
                                                <option value="Dhule">Dhule (धुळे )</option>
                                                <option value="Nanded">Nanded (नांदेड )</option>
                                            </select>
                                        </div>
                                     <!--   <div class="form-check">
                                            <label>Second preference (दुसरे प्राधान्य)</label>
                                            <select class="form-control" name="secondcenter">
											<option value="">Select</option>
                                                <option value="Latur">Latur (लातूर )</option>
                                                <option value="Solapur">Solapur (सोलापूर )</option>
                                                <option value="Dhule">Dhule (धुळे )</option>
                                                <option value="Nanded">Nanded (नांदेड )</option>
                                            </select>

                                        </div>
                                        <div class="form-check">
                                            <label>Third preference (तिसरे प्राधान्य)</label>
                                            <select class="form-control" name="thirdcenter">
											<option value="">Select</option>
                                                <option value="Latur">Latur (लातूर )</option>
                                                <option value="Solapur">Solapur (सोलापूर )</option>
                                                <option value="Dhule">Dhule (धुळे )</option>
                                                <option value="Nanded">Nanded (नांदेड )</option>
                                            </select>
                                        </div>-->
                                        <!--<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Nanded" name="centre5" id="centreNanded">
                        <label class="form-check-label" for="centreNanded">
                            Nanded
                        </label> Latur@413512
                    </div>-->
					टीप-सोबत दिलेल्या परीक्षा केंद्राच्या यादीनुसार परीक्षा केंद्र निवडावे, वरील परीक्षा केंद्रावर पुरेशा प्रमाणात विद्यार्थी संख्या उपलब्ध झाले नसल्यास , विद्यालयामार्फत वरील परीक्षा केंद्रापैकी नजीकचे परीक्षा केंद्र दिले जाईल.
                                    </div>
                                    <label><i class="fas fa-upload"></i> Upload Documents (कागदपत्रे अपलोड करा)</label>

                                    <!-- Upload Documents -->
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students Photo (विद्यार्थ्यांचा
                                            फोटो)</label>
                                        <span>* Please upload student's clear photograph (ONLY JPG / PNG FORMAT) (FILE
                                            SIZE MUST BE LESS THAN 100 KB) <span>

                                                <input type="file" class="form-control" name="studphoto"
                                                    id="uploadDocuments" required>
                                    </div>
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students aadhar (विद्यार्थ्यांचा आधार
                                            कार्ड)</label>
                                        <input type="file" class="form-control" name="studaadhar" id="uploadDocuments"
                                            required>
                                    </div>
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students Sign (विद्यार्थ्यांचा
                                            स्वाक्षरी)</label>
                                        <span>* Please upload student's clear signature (ONLY JPG / PNG FORMAT) (FILE
                                            SIZE MUST BE LESS THAN 100 KB) <span>
                                                <input type="file" class="form-control" name="studsign"
                                                    id="uploadDocuments" required>
                                    </div>
                                    <div>
                                        <a href="https://tinyjpg.com/" target="_blank">Click here to Compress Image Size
                                            Online</a><br>
                                        <a href="https://www.iloveimg.com/crop-image" target="_blank">Click here to Crop
                                            Image Online</a>
                                    </div>
                                    <!-- Pay Fee -->
                                    <div class="form-group">
                                        <label>Pay Fee (Fees as per selected category)</label>
                                        <input type="text" class="form-control" name="payment" id="payFee" readonly>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                                        <label class="form-check-label" for="acceptTerms">
                                            I hereby declare that all above data provided is correct and best to my
                                            knowledge .
                                        </label>
                                    </div>
                                </div>
                                <div id="show11" class="form-group mb-3">
                                    <label class="form-check-label" for="acceptTerms">
                                        <strong> Golden Opportunity
                                            To Join National Defence Academy And Become An Officer In Army/navy/ Air
                                            Force, Special Reserved Seats Available For Admission To 11th Science
                                            After 10th Board Exams Contact :
											+91 7588938505
                                            Or Visit Our Web Site <a href="Https://sainikividyalayatuljapur.in/ ">
                                                Https://sainikividyalayatuljapur.in/ </a> </strong>
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit
                                    (जमा)</button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <center><img class="mb-4" src="../assets/img/logosainik.jpeg" width="25%" alt="Logo"></center>
                    <center><img class="mb-4" src="../assets/img/tuljabhawani.jpeg" width="25%" alt="Logo"></center> -->
                    <div class="row">
                        <div class="col-md-3" align="center">
                            <img src="../assets/img/logosainik.jpeg" style="width: 80%;" alt="Logo">
                        </div>
                        <div class="col-md-6" align="center">
                            <center>
                                <h4 style="color: #b1a8a8; font-size:14px;">Shri Tuljabhavani Temple Trust's,</h4>
                            </center>
                            <p style="color: #000; font-size:18px;" align="center"><b>Shri Tuljabhavani Sainiki Sec. &
                                    Higher Sec. School,Tuljapur</b></p>
                        </div>
                        <div class="col-md-3" align="center">
                            <img src="../assets/img/tuljabhawani.jpeg" style="width:80%; padding:10px;" alt="Logo">
                        </div>
                    </div>





                    <div class="p-1" style="background-color:#f6c13d;">
                        <center>
                            <h6><b>महत्वाच्या सूचना </b></h6>
                        </center>
                    </div>
                    <div class="rule">
                        <ol type="1">
                            <!--<p> <strong>
    श्री तुळजाभवानी मंदिर संस्थान संचलित<br>
    श्री तुळजाभवानी सैनिकी माध्यमिक व उच्च माध्यमिक विद्यालय, तुळजापूर.<br>
    ता. तुळजापूर, जि. धाराशिव पिन कोड - 413601 </strong>
</p>-->
                            <br>
                            <!--<h6> <strong> इयत्ता 6 वी वर्गातील प्रवेशासाठी जाहिरात 2025-26 </strong></h6>

<h6> <strong>मुलांचे निवासी सैनिकी विद्यालय</strong></h6>-->

                            <h6> <strong>इयत्ता सहावी वर्गातील प्रवेशासाठी जाहिरात 2025-26 मध्ये मुलांचे निवासी सैनिकी
                                    विद्यालयात इयत्ता सहावी (C.B.S.E) प्रवेशासाठी ऑनलाइन/ ऑफलाइन पद्धतीने अर्ज स्वीकारले
                                    जातील.
                                </strong></h6>
                            <br>
                            <h5><strong> एका दृष्टीक्षेपात महत्त्वाची माहिती </strong> </h5>

                            <h6>नियम व अटी :-</h6>
                            <ul>

                                <li> कैडेट्स का चयन लिखित, शारीरिक और मेडिकल फिटनेस टेस्ट के परिणाम के आधार पर किया
                                    जाएगा ।</li>
                                <li>केवल 90 कैडेट्स (अधिकतम 30 एसटी कैडेट्स सहित) को प्रवेश दिया जाएगा ।</li>
                                <li> कैडेट्स को गुणवत्ता एवं राज्य सरकार की आरक्षण नीति के अनुसार प्रवेश दिया जाएगा ।
                                </li>
                                <li>चयनित कैडेट्स के लिए 12 वीं (विज्ञान) तक की पढाई करना अनिवार्य है । प्रवेश के समय
                                    सैनिक विद्यालय में कक्षा 12 वीं (विज्ञान) तक की
                                    शिक्षा पूरी करने की हमी 500/- रूपये के बॉन्ड पेपर पर लिखकर देना अनिवार्य होगा ।
                                </li>
                                <li>
                                    यदि विद्यार्थी किसी कारण से सैनिक स्कूल छोड देता है, तो (ए) खुला एवं अन्य पिछडा वर्ग
                                    : रु. 20,000/- (बीस हजार मात्र), (ब) आरक्षित श्रेणी
                                    (एससी, एसटी, एनटी, एसबीसी) - रु. 10,000/- (दस हजार मात्र) जुर्माने की राशी सरकारी
                                    खाते में जमा करना अनिवार्य होगा ।
                                </li>
                                <li> सैनिक स्कूल में प्रवेशित प्रत्येक विद्यार्थी के लिए कक्षा 12 वीं में अध्ययन करते
                                    समय राष्ट्रीय रक्षा अकादमी (UPSC - NDA) प्रवेश परीक्षा में
                                    शामिल होना और यदि वह उत्तीर्ण होता है तो उसे राष्ट्रीय रक्षा अकादमी में प्रवेश लेना
                                    भी अनिवार्य होगा ।</li>
                                <li> मेस और छात्रावास का शुल्क महाराष्ट्र सरकार के नियम एवं नीति के अनुसार लागू होगा ।
                                    (अधिक जानकारी के लिए विद्यालय की वेबसाइट देखें - <a
                                        href="https://sainikividyalayatuljapur.in">https://sainikividyalayatuljapur.in</a>
                                    )</li>
                            </ul>


                            <h6>Rules To Follow:-</h6>
                            <ul>

                                <li>Selection of CADETS will be based on result of Written, Physical and Medical fitness
                                    tests. </li>
                                <li>Only 90 cadets ( including maximum 30 ST students) will be given admission.</li>
                                <li>Cadets will be given admission as per merit and state government reservation policy.
                                </li>
                                <li>It is mandatory for selected cadets to study up to class 12 (Science). At the time
                                    of admission, it is compulsory to give a Written Guarantee of completing education
                                    up to class 12 (Science) on Rs. 500/- stamp paper.</li>
                                <li>In case the cadet leaves the Sainik School due to some reason, then FINE as follows
                                    will have to be deposited in Government Treasury – (A). Open & OBC Category- Rs.
                                    20,000/- (Twenty Thousand only), (B). Reserved Category (SC,ST,NT,SBC) - Rs,
                                    10,000/- (Ten Thousand Only).
                                </li>
                                <li>It is also mandatory for every cadet admitted in Sainik School to appear for the
                                    National Defense Academy (UPSC-NDA) Entrance Examination while studying in class 12
                                    and if he passes, he will take admission there.</li>
                                <li>Fees for Mess and Hostel will be applicable according to the Maharashtra Government
                                    rules and regulations. (For more information visit school website- <a
                                        href="https://sainikividyalayatuljapur.in"
                                        target="_blank">https://sainikividyalayatuljapur.in</a>)</li>
                            </ul>

                            <p><strong>Note:</strong> Exam fees mentioned above are non-refundable.</p>

                        </ol>
                    </div>

                    <div class="p-1" style="background-color:#1cc688;">
                        <center>
                            <h6><b>नोंदणी केली असल्यास LOGIN बटण वर CLICK करा. </b></h6>
                        </center>
                    </div>
                    <hr>
                    <p class="text-center" style="font-size:14px;">If you have already created an account, please click
                        login button</p>
                    <center><a href="studentlogin.php" class="btn" style="background-color:#1cc688;">LOGIN</a></center>
                </div>

            </div>
        </div>

    </div>
    <script>
        function showdata(vd) {
            //alert(vd);
            if (vd == "6th") {
                document.getElementById('show6').style.display = "block";
                document.getElementById('show11').style.display = "none";
            } else {
                document.getElementById('show6').style.display = "none";
                document.getElementById('show11').style.display = "block";
            }
        }
        function getvalue(val) {
            $("#payFee").val(val)
        }


        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function capitalizeInput(event) {
            const input = event.target;
            const cursorPosition = input.selectionStart; // Get current cursor position

            input.value = capitalizeFirstLetter(input.value);

            // Restore the cursor position
            input.setSelectionRange(cursorPosition, cursorPosition);
        }

        $(document).ready(function () {
            $('input[type="text"], textarea').on('input', capitalizeInput);
        });
    </script>


    <?php unset($_SESSION['message']); ?>
    <?php unset($_SESSION['error1']); ?>
</body>

</html>