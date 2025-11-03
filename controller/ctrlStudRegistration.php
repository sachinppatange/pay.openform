<?php
session_start();
include_once '../config/config.php';

if (isset($_POST['submit'])) {
    $studid = $_POST['studid'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $fathers_name = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $alternateno = $_POST['alternateno'];
    $password = $_POST['password'];
    $aadhar = $_POST['aadhar'];
    $course = $_POST['course'];
    $dob = $_POST['dob'];
    $adcategory = $_POST['adcategory'];
    $category = $_POST['category'];
    $address = $_POST['address'];
    $schoolname = $_POST['schoolname'];
    $previousstd = $_POST['previousstd'];
    $grade = $_POST['grade'];
    $board = $_POST['board'];
    $language = $_POST['language'];
    $studphoto = $_POST['studphoto'];
    $studaadhar = $_POST['studaadhar'];
    $studsign = $_POST['studsign'];

    $center1 = $_POST['centre1'];
    $center2 = $_POST['firstcenter'];
    $center3 = $_POST['secondcenter'];
    $center4 = $_POST['thirdcenter'];
    // $center5 = $_POST['centre5'];
    $centerarr = ['centre1' => $center1, 'centre2' => $center2, 'centre3' => $center3, 'centre4' => $center4, 'centre5' => $center5];
    $jsonarr = json_encode($centerarr);
    // print_r($jsonarr);
    $payment = $_POST['payment'];
    // $uploadDocuments = $_POST['uploadDocuments'];
    $createdby = $_SESSION['id'];
    $createdon = date('Y-m-d H:i:s');


    $query = "SELECT * FROM student WHERE whatsappno = '$whatsapp'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['error1'] = "Mobile Number already exists.";
        header('location:../web/index.php');
        exit(); // Stop further execution
    }

    $targetDir = "../uploads/";

    // Handle student photo upload
    $studphoto = $_FILES['studphoto']['name'];
    $extstudphoto = pathinfo($studphoto, PATHINFO_EXTENSION);
    $photoname = "photo_" . $whatsapp . "." . $extstudphoto;
    $targetFilePathPhoto = $targetDir . $photoname;
    move_uploaded_file($_FILES['studphoto']['tmp_name'], $targetFilePathPhoto);

    // Handle student Aadhar upload
    $studaadhar = $_FILES['studaadhar']['name'];
    $extstudaadhar = pathinfo($studaadhar, PATHINFO_EXTENSION);
    $aadharname = "aadhar_" . $whatsapp . "." . $extstudaadhar;
    $targetFilePathAadhar = $targetDir . $aadharname;
    move_uploaded_file($_FILES['studaadhar']['tmp_name'], $targetFilePathAadhar);

    // Handle student signature upload
    $studsign = $_FILES['studsign']['name'];
    $extstudsign = pathinfo($studsign, PATHINFO_EXTENSION);
    $signname = "sign_" . $whatsapp . "." . $extstudsign;
    $targetFilePathSign = $targetDir . $signname;
    move_uploaded_file($_FILES['studsign']['tmp_name'], $targetFilePathSign);
    // {"center1":null,"center2":"Latur (u0932u093eu0924u0942u0930)","center3":null,"center4":null,"center5
    if ($studid == '') {
        $query = "INSERT INTO `student` (`stud_id`, `surname`, `firstname`, `fathername`, `mothername`, `email`, `whatsappno`, `alternateno`, `aadhar`, `course`, `dob`,`adcategory`, `category`, `address`, `schoolname`, `previousstd`, `grade`, `board`, `language`,`studphoto`,`studaadhar`,`studsign`,`centre`,`amount`, `createdby`, `createdon`) VALUES (NULL, '$surname', '$firstname', '$fathers_name','$mothername', '$email', '$whatsapp', '$alternateno', '$aadhar', '$course', '$dob','$adcategory','$category', '$address', '$schoolname', '$previousstd', '$grade', '$board','$language','$targetFilePathPhoto','$targetFilePathAadhar','$targetFilePathSign','$center1,$center2,$center3,$center4','$payment', '$createdby', '$createdon');";
        $result = mysqli_query($GLOBALS['conn'], $query);
        // exit;

        $query = "select max(`stud_id`) as sid from student";
        $result = mysqli_query($GLOBALS['conn'], $query);
        $arr = mysqli_fetch_array($result);

        $_SESSION['id'] = $arr['sid'];
        $_SESSION['username'] = $arr['email'];
        $_SESSION['type'] = 'student';


        $_SESSION['message'] = "Redirecting  for Payment  ";
        $query = "select max(`stud_id`) from student";
        $result = mysqli_query($GLOBALS['conn'], $query);

        $arr = mysqli_fetch_array($result);
        $studmaxid = $arr[0];

        header("Location: ../web/index.php?studmaxid=$studmaxid");

    } else {
        $query = "UPDATE student SET
        surname = '$surname',
       stud_name = '$stud_name',
       fathers_name = '$fathers_name',
       email = '$email',
       mobile = '$mobile',
       password = '$password',
       aadhar_no = '$aadhar_no',       
       dob = '$dob',
       createdon = '$createdon' WHERE stud_reg_id = '$studid'";

        $result = mysqli_query($GLOBALS['conn'], $query);

        header('Location: ../admin/member.php');

    }

}
?>