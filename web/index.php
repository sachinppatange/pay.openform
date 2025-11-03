<?php
session_start();
include_once '../config/config.php';
include_once '../controller/ctrlgetStudDetails.php';

// Safe way to get student id from GET parameter
$studid = isset($_GET['studmaxid']) ? $_GET['studmaxid'] : null;

// Get student details safely (avoid null warnings)
$stud = null;
if ($studid) {
    $stud = getStudentByStudId($studid);
}

// Include Razorpay PHP library
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Initialize Razorpay
$api_key = 'rzp_live_D53J9UWwYtGimn';
$api_secret = 'w0SnqzH2SOOIc0gnUR7cYO3r';

// Amount calculation with safe checks
$amount = (!empty($stud) && !empty($stud['amount'])) ? $stud['amount'] * 100 : 100;

$api = new Api($api_key, $api_secret);
$order_id = '';
$order = null;
// Create Razorpay order only if $stud is not null
if (!empty($stud)) {
    $order = $api->order->create([
        'amount' => $amount, // in paise
        'currency' => 'INR',
        'receipt' => 'order_receipt_' . ($studid ? $studid : '1001')
    ]);
    $order_id = $order->id;
}

// Set your callback URL
$callback_url = "https://registration.sainikividyalayatuljapur.in/web/paymentrecipt.php?chk=success";

// Razorpay script
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';

echo '<script>
function startPayment() {
    var options = {
        key: "' . $api_key . '",
        amount: ' . $amount . ',
        currency: "INR",
        name: "' . (!empty($stud) ? $stud['surname'] . " " . $stud['firstname'] : "Student") . '",
        description: "Student Registration Fee",
        image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
        order_id: "' . $order_id . '",
        theme: { color: "#738276" },
        handler: function (response) {
            window.location.href = "./portal.php?chk=success&studid=' . (!empty($stud) ? $stud['stud_id'] : '') . '";
        },
        prefill: {
            name: "' . (!empty($stud) ? $stud['surname'] . " " . $stud['firstname'] : '') . '",
            email: "' . (!empty($stud) ? $stud['email'] : '') . '",
            contact: "' . (!empty($stud) ? $stud['whatsappno'] : '') . '"
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

?>

<script>
<?php if (!empty($_SESSION['message'])): ?>
    var message = "<?php echo $_SESSION['message']; ?>";
    alert(message);
<?php endif; ?>
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(function_exists('getcompany') ? getcompany() : "Registration", ENT_QUOTES, "UTF-8"); ?></title>
    <link rel="icon" href="../assets/img/logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        .size { font-size: 12px; }
        .rule li { font-size: 13px; }
        .error { font-size: 12px; color: red; }
        .card { border-radius: 12px; }
        .form-group { padding: 5px; }
        .form-control { border-radius: 10px; box-shadow: none; }
        .form-check-label { font-size: 14px; }
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
            top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;
        }
        .file-input-wrapper label {
            background-color: #f8f9fc;
            padding: 8px;
            border-radius: 8px;
            border: 2px dashed #4e73df;
            display: inline-block; width: 100%; text-align: center;
            font-size: 14px; color: #4e73df; cursor: pointer;
        }
        .image-container {
            display: flex; justify-content: center; align-items: center; gap: 20px;
        }
        .image-container img { width: 25%; height: auto; }
    </style>
    <script>
        function showpayment(studid) {
            if (studid != "") {
                startPayment();
            }
        }
    </script>
</head>
<body style="background-color:#87CEFA" onload="showpayment('<?php echo $studid ? $studid : ""; ?>')">
    <div class="container">
        <div class="card p-4 m-3">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h3 class="text-primary">Registration Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="../controller/ctrlStudRegistration.php" method="post" enctype="multipart/form-data">
                                <!-- Surname -->
                                <div class="form-group">
                                    <label for="surname"><i class="fas fa-user"></i> Surname</label>
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter surname" required>
                                </div>
                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="firstname"><i class="fas fa-user"></i> First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter first name" required>
                                </div>
                                <!-- Father's Name -->
                                <div class="form-group">
                                    <label for="fathername"><i class="fas fa-user"></i> Father's Name</label>
                                    <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Enter father's name" required>
                                </div>
                                <!-- Mother's Name -->
                                <div class="form-group">
                                    <label for="mothername"><i class="fas fa-user"></i> Mother's Name</label>
                                    <input type="text" class="form-control" name="mothername" id="mothername" placeholder="Enter mother's name" required>
                                </div>
                                <!-- Email ID -->
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope"></i> Email ID</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                                </div>
                                <!-- WhatsApp Number -->
                                <div class="form-group">
                                    <?php if (!empty($_SESSION['error1'])): ?>
                                        <h4 style="color:red;"><?php echo $_SESSION['error1']; ?></h4>
                                    <?php endif; ?>
                                    <label for="whatsapp"><i class="fas fa-phone-alt"></i> Whats App Number</label>
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Enter WhatsApp number" maxlength="10" onkeypress="if (isNaN(this.value + String.fromCharCode(event.keyCode))) return false;" required>
                                </div>
                                <!-- Alternate Number -->
                                <div class="form-group">
                                    <label for="alternateno"><i class="fas fa-phone-alt"></i> Alternate Number</label>
                                    <input type="text" class="form-control" name="alternateno" id="alternateno" placeholder="Enter alternate number" maxlength="10" onkeypress="if (isNaN(this.value + String.fromCharCode(event.keyCode))) return false;" required>
                                </div>
                                <!-- Aadhar Number -->
                                <div class="form-group">
                                    <label for="aadhar"><i class="fas fa-id-card"></i> Aadhar Number</label>
                                    <input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Enter Aadhar number" maxlength="12" onkeypress="if (isNaN(this.value + String.fromCharCode(event.keyCode))) return false;" required>
                                </div>
                                <!-- Course Selection -->
                                <div class="form-group">
                                    <label>Course</label>
                                    <select class="form-control" name="course" id="course6" onchange="showdata(this.value)" required>
                                        <option value="">Select Course</option>
                                        <option value="6th">6th</option>
                                        <option value="11th">11th</option>
                                    </select>
                                </div>
                                <div id="show6">
                                    <!-- Date of Birth -->
                                    <div class="form-group">
                                        <label for="dob"><i class="fas fa-calendar-alt"></i> Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob" min="2013-01-01" max="2015-12-31" required>
                                    </div>
                                    <!-- Admission Category -->
                                    <div class="form-group">
                                        <label for="adcategory"><i class="fas fa-book"></i> Admission Category</label>
                                        <select class="form-control" name="adcategory" id="adcategory" required>
                                            <option value="Open">Open</option>
                                            <option value="OBC">OBC</option>
                                            <option value="SEBC">SEBC</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                            <option value="VJ">VJ</option>
                                            <option value="NT-B">NT-B</option>
                                            <option value="NT-C">NT-C</option>
                                            <option value="NT-D">NT-D</option>
                                            <option value="SBC">SBC</option>
                                        </select>
                                    </div>
                                    <!-- Fees Category -->
                                    <div class="form-group">
                                        <label>Fees Category</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="categoryGeneral" value="A) Open/OBC/SEBC." onclick="getvalue('1')" required>
                                            <label class="form-check-label" for="categoryGeneral">A) Open/OBC/SEBC. = Rs 354/-</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="categorySC" value="B) SC/ST/VJ NT/SBC" onclick="getvalue('1')" required>
                                            <label class="form-check-label" for="categorySC">B) SC/ST/VJ NT/SBC = Rs 236/-</label>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
                                    </div>
                                    <!-- Present School Name -->
                                    <div class="form-group">
                                        <label for="schoolname"><i class="fas fa-school"></i> Present School Name</label>
                                        <input type="text" class="form-control" name="schoolname" id="schoolname" placeholder="Enter present school name" required>
                                    </div>
                                    <!-- Previous Standard -->
                                    <div class="form-group">
                                        <label for="previousstd"><i class="fas fa-book"></i> Previous Std.</label>
                                        <select class="form-control" name="previousstd" id="previousstd" required>
                                            <option value="5th">5th</option>
                                            <option value="6th">6th</option>
                                        </select>
                                    </div>
                                    <!-- Grade Obtained -->
                                    <div class="form-group">
                                        <label for="grade"><i class="fas fa-star"></i> Grade Obtained in Previous Std.</label>
                                        <select class="form-control" name="grade" id="grade" required>
                                            <option value="5th">Select Grade</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                            <option value="C1">C1</option>
                                            <option value="C2">C2</option>
                                        </select>
                                    </div>
                                    <!-- Board (Dropdown) -->
                                    <div class="form-group">
                                        <label for="board"><i class="fas fa-list"></i> Board</label>
                                        <select class="form-control" id="board" name="board" required>
                                            <option value="Maharashtra State Board">Maharashtra State Board</option>
                                            <option value="CBSE">CBSE</option>
                                            <option value="ICSE">ICSE</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <!-- Preferred Language for Exam -->
                                    <div class="form-group">
                                        <label>Preferred Language for Exam</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language" id="languageEnglish" value="english" required>
                                            <label class="form-check-label" for="languageEnglish">English</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language" id="languageMarathi" value="marathi" required>
                                            <label class="form-check-label" for="languageMarathi">Marathi</label>
                                        </div>
                                    </div>
                                    <!-- Exam Centre Choice -->
                                    <div class="form-group">
                                        <label>Exam Centre Choice</label>
                                        <div class="form-check">
                                            <label>Select Preference</label>
                                            <select class="form-control" name="firstcenter">
                                                <option value="">Select</option>
                                                <option value="Tuljapur">Tuljapur</option>
                                                <option value="Latur">Latur</option>
                                                <option value="Solapur">Solapur</option>
                                                <option value="Dhule">Dhule</option>
                                                <option value="Nanded">Nanded</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Upload Documents -->
                                    <label><i class="fas fa-upload"></i> Upload Documents</label>
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students Photo</label>
                                        <input type="file" class="form-control" name="studphoto" id="uploadDocuments" required>
                                    </div>
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students aadhar</label>
                                        <input type="file" class="form-control" name="studaadhar" id="uploadDocuments" required>
                                    </div>
                                    <div class="form-group file-input-wrapper1">
                                        <label><i class="fas fa-upload"></i> Students Sign</label>
                                        <input type="file" class="form-control" name="studsign" id="uploadDocuments" required>
                                    </div>
                                    <!-- Pay Fee -->
                                    <div class="form-group">
                                        <label>Pay Fee (Fees as per selected category)</label>
                                        <input type="text" class="form-control" name="payment" id="payFee" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                                        <label class="form-check-label" for="acceptTerms">
                                            I hereby declare that all above data provided is correct and best to my knowledge .
                                        </label>
                                    </div>
                                </div>
                                <div id="show11" class="form-group mb-3" style="display:none;">
                                    <label class="form-check-label" for="acceptTerms">
                                        <!-- Extra Info for 11th: Add as needed -->
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="text-center" style="font-size:14px;">If you have already created an account, please click login button</p>
                    <center><a href="studentlogin.php" class="btn" style="background-color:#1cc688;">LOGIN</a></center>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showdata(vd) {
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
            const cursorPosition = input.selectionStart;
            input.value = capitalizeFirstLetter(input.value);
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