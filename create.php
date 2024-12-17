<?php

// Database connection parameters
$servername = "localhost";  
$username = "root";  
$password = "";  
$database = "checklistofcoursesdb";  

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define/initialize the variable
$student_number = "";
$name_of_student = "";
$address = "";
$date_of_admission = "";
$contact_number = "";
$name_of_advisor = "";

$firstyear_firstsem_course_code = "";
$firstyear_firstsem_course_title = "";
$firstyear_firstsem_credit_unit_lecture = "";
$firstyear_firstsem_credit_unit_laboratory = "";
$firstyear_firstsem_pre_requisite = "";
$firstyear_firstsem_prof_instructor = "";
$firstyear_firstsem_final_grade = "";

$firstyear_secondsem_course_code = "";
$firstyear_secondsem_course_title = "";
$firstyear_secondsem_credit_unit_lecture = "";
$firstyear_secondsem_credit_unit_laboratory = "";
$firstyear_secondsem_pre_requisite = "";
$firstyear_secondsem_prof_instructor = "";
$firstyear_secondsem_final_grade = "";

$secondyear_firstsem_course_code = "";
$secondyear_firstsem_course_title = "";
$secondyear_firstsem_credit_unit_lecture = "";
$secondyear_firstsem_credit_unit_laboratory = "";
$secondyear_firstsem_pre_requisite = "";
$secondyear_firstsem_prof_instructor = "";
$secondyear_firstsem_final_grade = "";

$secondyear_secondsem_course_code = "";
$secondyear_secondsem_course_title = "";
$secondyear_secondsem_credit_unit_lecture = "";
$secondyear_secondsem_credit_unit_laboratory = "";
$secondyear_secondsem_pre_requisite = "";
$secondyear_secondsem_prof_instructor = "";
$secondyear_secondsem_final_grade = "";

$thirdyear_firstsem_course_code = "";
$thirdyear_firstsem_course_title = "";
$thirdyear_firstsem_credit_unit_lecture = "";
$thirdyear_firstsem_credit_unit_laboratory = "";
$thirdyear_firstsem_pre_requisite = "";
$thirdyear_firstsem_prof_instructor = "";
$thirdyear_firstsem_final_grade = "";

$errorMessage = "";
$successMessage = "";

//Fetch data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_POST["student_number"];
    $name_of_student = $_POST["name_of_student"];
    $address = $_POST["address"];
    $date_of_admission = $_POST["date_of_admission"];
    $contact_number = $_POST["contact_number"];
    $name_of_advisor = $_POST["name_of_advisor"];

    $firstyear_firstsem_course_code = $_POST["firstyear_firstsem_course_code"];
    $firstyear_firstsem_course_title = $_POST["firstyear_firstsem_course_title"];
    $firstyear_firstsem_credit_unit_lecture = $_POST["firstyear_firstsem_credit_unit_lecture"];
    $firstyear_firstsem_credit_unit_laboratory = $_POST["firstyear_firstsem_credit_unit_laboratory"];
    $firstyear_firstsem_pre_requisite = $_POST["firstyear_firstsem_pre_requisite"];
    $firstyear_firstsem_prof_instructor = $_POST["firstyear_firstsem_prof_instructor"];
    $firstyear_firstsem_final_grade = $_POST["firstyear_firstsem_final_grade"];

    $firstyear_secondsem_course_code = $_POST["firstyear_secondsem_course_code"];
    $firstyear_secondsem_course_title = $_POST["firstyear_secondsem_course_title"];
    $firstyear_secondsem_credit_unit_lecture = $_POST["firstyear_secondsem_credit_unit_lecture"];
    $firstyear_secondsem_credit_unit_laboratory = $_POST["firstyear_secondsem_credit_unit_laboratory"];
    $firstyear_secondsem_pre_requisite = $_POST["firstyear_secondsem_pre_requisite"];
    $firstyear_secondsem_prof_instructor = $_POST["firstyear_secondsem_prof_instructor"];
    $firstyear_secondsem_final_grade = $_POST["firstyear_secondsem_final_grade"];

    $secondyear_firstsem_course_code = $_POST["secondyear_firstsem_course_code"];
    $secondyear_firstsem_course_title = $_POST["secondyear_firstsem_course_title"];
    $secondyear_firstsem_credit_unit_lecture = $_POST["secondyear_firstsem_credit_unit_lecture"];
    $secondyear_firstsem_credit_unit_laboratory = $_POST["secondyear_firstsem_credit_unit_laboratory"];
    $secondyear_firstsem_pre_requisite = $_POST["secondyear_firstsem_pre_requisite"];
    $secondyear_firstsem_prof_instructor = $_POST["secondyear_firstsem_prof_instructor"];
    $secondyear_firstsem_final_grade = $_POST["secondyear_firstsem_final_grade"];

    $secondyear_secondsem_course_code = $_POST["secondyear_secondsem_course_code"];
    $secondyear_secondsem_course_title = $_POST["secondyear_secondsem_course_title"];
    $secondyear_secondsem_credit_unit_lecture = $_POST["secondyear_secondsem_credit_unit_lecture"];
    $secondyear_secondsem_credit_unit_laboratory = $_POST["secondyear_secondsem_credit_unit_laboratory"];
    $secondyear_secondsem_pre_requisite = $_POST["secondyear_secondsem_pre_requisite"];
    $secondyear_secondsem_prof_instructor = $_POST["secondyear_secondsem_prof_instructor"];
    $secondyear_secondsem_final_grade = $_POST["secondyear_secondsem_final_grade"];

    $thirdyear_firstsem_course_code = $_POST["thirdyear_firstsem_course_code"];
    $thirdyear_firstsem_course_title = $_POST["thirdyear_firstsem_course_title"];
    $thirdyear_firstsem_credit_unit_lecture = $_POST["thirdyear_firstsem_credit_unit_lecture"];
    $thirdyear_firstsem_credit_unit_laboratory = $_POST["thirdyear_firstsem_credit_unit_laboratory"];
    $thirdyear_firstsem_pre_requisite = $_POST["thirdyear_firstsem_pre_requisite"];
    $thirdyear_firstsem_prof_instructor = $_POST["thirdyear_firstsem_prof_instructor"];
    $thirdyear_firstsem_final_grade = $_POST["thirdyear_firstsem_final_grade"];

    do {
        if (empty($student_number) || empty($name_of_student) || empty($address) || empty($date_of_admission)  || empty($contact_number) || empty($name_of_advisor) ||
        empty($firstyear_firstsem_course_code) || empty($firstyear_firstsem_course_title) || empty($firstyear_firstsem_credit_unit_lecture) || empty($firstyear_firstsem_credit_unit_laboratory) || empty($firstyear_firstsem_pre_requisite) || empty($firstyear_firstsem_prof_instructor) || empty($firstyear_firstsem_final_grade) ||
        empty($firstyear_secondsem_course_code) || empty($firstyear_secondsem_course_title) || empty($firstyear_secondsem_credit_unit_lecture) || empty($firstyear_secondsem_credit_unit_laboratory) || empty($firstyear_secondsem_pre_requisite) || empty($firstyear_secondsem_prof_instructor) || empty($firstyear_secondsem_final_grade) ||
        empty($secondyear_firstsem_course_code) || empty($secondyear_firstsem_course_title) || empty($secondyear_firstsem_credit_unit_lecture) || empty($secondyear_firstsem_credit_unit_laboratory) || empty($secondyear_firstsem_pre_requisite) || empty($secondyear_firstsem_prof_instructor) || empty($secondyear_firstsem_final_grade) ||
        empty($secondyear_secondsem_course_code) || empty($secondyear_secondsem_course_title) || empty($secondyear_secondsem_credit_unit_lecture) || empty($secondyear_secondsem_credit_unit_laboratory) || empty($secondyear_secondsem_pre_requisite) || empty($secondyear_secondsem_prof_instructor) || empty($secondyear_secondsem_final_grade) ||
        empty($thirdyear_firstsem_course_code) || empty($thirdyear_firstsem_course_title) || empty($thirdyear_firstsem_credit_unit_lecture) || empty($thirdyear_firstsem_credit_unit_laboratory) || empty($thirdyear_firstsem_pre_requisite) || empty($thirdyear_firstsem_prof_instructor) || empty($thirdyear_firstsem_final_grade)
        ){
            $errorMessage = "All the fields are required" ;
            break;   
        }
        //Add new student
        $sql1 = "INSERT INTO student_information (student_number, date_of_admission, name_of_student, contact_number, address, name_of_adviser) 
        VALUES ('$student_number', '$date_of_admission', '$name_of_student', '$contact_number', '$address', '$name_of_adviser')";

        $sql2 = "INSERT INTO firstyear_firstsem (course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade)
        VALUES ('$course_code', '$course_title', '$credit_unit_lecture', '$credit_unit_laboratory', '$pre_requisite', '$prof_instructor', '$final_grade')";
    
        $sql3 = "INSERT INTO firstyear_secondsem (course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade)
        VALUES ('$course_code', '$course_title', '$credit_unit_lecture', '$credit_unit_laboratory', '$pre_requisite', '$prof_instructor', '$final_grade')";

        $sql4 = "INSERT INTO secondyear_firstsem (course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade)
        VALUES ('$course_code', '$course_title', '$credit_unit_lecture', '$credit_unit_laboratory', '$pre_requisite', '$prof_instructor', '$final_grade')";

        $sql5 = "INSERT INTO secondyear_secondsem (course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade)
        VALUES ('$course_code', '$course_title', '$credit_unit_lecture', '$credit_unit_laboratory', '$pre_requisite', '$prof_instructor', '$final_grade')";

        $sql6 = "INSERT INTO thirdyear_firstsem (course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade)
        VALUES ('$course_code', '$course_title', '$credit_unit_lecture', '$credit_unit_laboratory', '$pre_requisite', '$prof_instructor', '$final_grade')";

        $result = $connection->query($sql);

        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
            echo "Data inserted into both tables successfully";
        } else {
            echo "Error: " . $conn->error;
        }

        if ($result) {
            $errorMessage = "Invalid query:" . $connection->error;
        }

        $student_number = "";
        $name_of_student = "";
        $address = "";
        $date_of_admission = "";
        $contact_number = "";
        $name_of_advisor = "";

        $firstyear_firstsem_course_code = "";
        $firstyear_firstsem_course_title = "";
        $firstyear_firstsem_credit_unit_lecture = "";
        $firstyear_firstsem_credit_unit_laboratory = "";
        $firstyear_firstsem_pre_requisite = "";
        $firstyear_firstsem_prof_instructor = "";
        $firstyear_firstsem_final_grade = "";

        $firstyear_secondsem_course_code = "";
        $firstyear_secondsem_course_title = "";
        $firstyear_secondsem_credit_unit_lecture = "";
        $firstyear_secondsem_credit_unit_laboratory = "";
        $firstyear_secondsem_pre_requisite = "";
        $firstyear_secondsem_prof_instructor = "";
        $firstyear_secondsem_final_grade = "";

        $secondyear_firstsem_course_code = "";
        $secondyear_firstsem_course_title = "";
        $secondyear_firstsem_credit_unit_lecture = "";
        $secondyear_firstsem_credit_unit_laboratory = "";
        $secondyear_firstsem_pre_requisite = "";
        $secondyear_firstsem_prof_instructor = "";
        $secondyear_firstsem_final_grade = "";

        $secondyear_secondsem_course_code = "";
        $secondyear_secondsem_course_title = "";
        $secondyear_secondsem_credit_unit_lecture = "";
        $secondyear_secondsem_credit_unit_laboratory = "";
        $secondyear_secondsem_pre_requisite = "";
        $secondyear_secondsem_prof_instructor = "";
        $secondyear_secondsem_final_grade = "";

        $thirdyear_firstsem_course_code = "";
        $thirdyear_firstsem_course_title = "";
        $thirdyear_firstsem_credit_unit_lecture = "";
        $thirdyear_firstsem_credit_unit_laboratory = "";
        $thirdyear_firstsem_pre_requisite = "";
        $thirdyear_firstsem_prof_instructor = "";
        $thirdyear_firstsem_final_grade = "";

    $successMessage = "New student added succesfully";

    header("location:index.php");
    exit;

} while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkliststyle.css"> 
    <title>Checklist of Courses</title>
</head>
<body>
    <img src="cvsu-logo.png" alt="Logo" class="logo">
<header>
        <h1>Republic of the Philippines</h1>
        <h2>CAVITE STATE UNIVERSITY</h2>
        <h3>Bacoor City Campus</h3>
        <h4>BACHELOR OF SCIENCE IN COMPUTER SCIENCE</h4>
        <h5>CHECKLIST OF COURSES</h5>
    </header>
    <form action="index.php" method="post">
        <table>
            <tr>
            <th colspan="4">Student Number: <input type="text" value= "<?php echo $student_number;?>" input name= "student_number"  maxlength ="20" required></th>
                <th colspan="3">Date of Admission: <input type="date" placeholder="YYYY-MM-DD" value= "<?php echo $date_of_admission;?>" input name = "date_of_admission"> </th>
           </tr>
            <tr>
            <th colspan="4">Name of Student: <input type="text" value= "<?php echo $name_of_student;?>" input name="name_of_student" maxlength = "100" required></th>
                <th colspan="3">Contact Number: <input type="text" value= "<?php echo $contact_number;?>" input name="contact_number" maxlength = "20" required></th>
            </tr>
            <tr>
            <th colspan="4">Address: <input type= "text" value= "<?php echo $address;?>" input name = "address" maxlength = "200" required></th>
                <th colspan="3">Name of Advisor: <input type = "text" value= "<?php echo $name_of_advisor;?>" input name = "name_of_advisor" maxlength= "100" required></th>
            </tr>

            <tr>
            <td rowspan="2"><b>COURSE CODE</b></td>
            <td rowspan="2"><b>COURSE TITLE</b></td>
            <td colspan="2"><b>CREDIT UNIT</b></td>
            <td rowspan="2"><b>PRE-REQUISITE</b></td>
            <td rowspan="2"><b>FINAL GRADE</b></td>
            <td rowspan="2"><b>PROFESSOR/INSTRUCTOR</b></td>
            </tr>

            <tr>
            <td><b>Lec</b></td>
            <td><b>Lab</b></td>
        </tr>

        <tr class = "centered">
            <th scope="col" colspan="7" style ="text-align: center;">FIRST YEAR</th>
        </tr>

        <!-- 1ST YEAR 1ST SEM -->

        <tr>
            <th colspan="7">First Semester</th>
        </tr>

        <tr>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_course_code;?>"></td>
            <td rowspan="2">Ethics</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_g;?>" name="ethics_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="ethics_instructor" maxlength= "100" required></td>
            <select name="sex" required>
                <option  value="">--Select--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
        </tr>

</body>
</html>