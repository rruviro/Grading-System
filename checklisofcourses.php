<?php

// Database connection parameters
$servername = "localhost";  // Change this if your database is on a different server
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$database = "mydbchecklist";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_number = "";
$name_of_student = "";
$address = "";
$date_of_admission = "";
$contact_number = "";
$name_of_advisor = "";

$firstyear_firstsem = "";
$firstyear_firstsem_instructor = "";

$firstyear_secondsem_grade = "";
$firstyear_secondsem_instructor = "";

$secondyear_firstsem_grade = "";
$secondyear_firstsem_instructor = "";

$secondyear_secondsem_grade = "";
$secondyear_secondsem_instructor = "";

$thirdyear_firstsem_grade = "";
$thirdyear_firstsem_instructor = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_POST["student_number"];
    $name_of_student = $_POST["name_of_student"];
    $address = $_POST["address"];
    $date_of_admission = $_POST["date_of_admission"];
    $contact_number = $_POST["contact_number"];
    $name_of_advisor = $_POST["name_of_advisor"];

    $firstyear_firstsem_grade = $_POST ["firstyear_firstsem_grade"];
    $firstyear_firstsem_instructor = $_POST ["firstyear_firstsem_instructor"];

    $firstyear_secondsem_grade = $_POST ["firstyear_secondsem_grade"];
    $firstyear_secondsem_instructor = $_POST ["firstyear_secondsem_instructor"];

    $secondyear_firstsem_grade = $_POST ["firstyear_firstsem_grade"];
    $secondyear_firstsem_instructor = $_POST ["secondyear_firstsem_instructor"];

    $secondyear_secondsem_grade = $_POST ["firstyear_firstsem_grade"];
    $secondyear_secondsem_instructor = $_POST ["secondyear_secondsem_instructor"];

    $thirdyear_firstsem_grade = $_POST ["thirdyear_firstsem_grade"];
    $thirdyear_firstsem_instructor = $_POST ["thirdyear_firstsem_instructor"];


    do {
        if (empty($student_number) || empty($name_of_student) || empty($address) || empty($date_of_admission)  || empty($contact_number) || empty($name_of_advisor) | empty($firstyear_firstsem_grade) | 
        empty($firstyear_firstsem_instructor) | empty($firstyear_secondsem_grade) | empty($firstyear_secondsem_instructor) | empty($secondyear_firstsem_grade) | empty($secondyear_firstsem_instructor) |
        empty($secondyear_secondsem_grade) | empty($secondyear_secondsem_instructor) | empty($thirdyear_firstsem_grade) | empty($thirdyear_firstsem_instructor) ) {

    $errorMessage = "All the fields are required" ;
    break;   
        }

        //add new student/query
        $sql1 = "INSERT INTO student_information (student_number, date_of_admission, name_of_student, contact_number, address, name_of_advisor) 
        VALUES ('$student_number', '$date_of_admission', '$name_of_student', '$contact_number', '$address', '$name_of_advisor')";

        $sql2 = "INSERT INTO firstyear_firstsem (firstyear_firstsem_grade, firstyear_firstsem_instructor)
        VALUES ('$firstyear_firstsem_grade','$firstyear_firstsem_instructor')";

        $sql2 = "INSERT INTO firstyear_secondsem (firstyear_secondsem_grade, firstyear_secondsem_instructor)
        VALUES ('$firstyear_secondsem_grade', '$firstyear_secondsem_instructor')";

        $sql3 = "INSERT INTO secondyear_firstsem (secondyear_firstsem_grade, secondyear_firstsem_instructor)
        VALUES ('$secondyear_firstsem_grade', '$secondyear_firstsem_instructor')";

        $sql4 = "INSERT INTO secondyear_secondsem (secondyear_secondsem_grade, secondyear_secondsem_instructor)
        VALUES ('$secondyear_secondsem_grade', '$secondyear_secondsem_instructor')";

        $sql4 = "INSERT INTO thirdyear_firstsem (thirdyear_firstsem_grade, thirdyear_firstsem_instructor)
        VALUES ('$thirdyear_firstsem_grade', '$thirdyear_firstsem_instructor')";

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

    $firstyear_firstsem_grade = "";
    $firstyear_firstsem_instructor = "";

    $firstyear_secondsem_grade = "";
    $firstyear_secondsem_instructor = "";

    $secondyear_firstsem_grade = "";
    $secondyear_firstsem_instructor = "";

    $secondyear_secondsem_grade = "";
    $secondyear_secondsem_instructor = "";

    $thirdyear_firstsem_grade = "";
    $thirdyear_firstsem_instructor = "";

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
    <div class="search-box">
        <input type="text" placeholder="Search..." >
        <button>Search</button>
        
    </div>

    <header>
        <h1>Republic of the Philippines</h1>
        <h2>CAVITE STATE UNIVERSITY</h2>
        <h3>Bacoor City Campus</h3>
        <h4>BACHELOR OF SCIENCE IN COMPUTER SCIENCE</h4>
        <h5>CHECKLIST OF COURSES</h5>
    </header>

    <form action="index.php" method="post">
        <table>
            
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
            <td rowspan="2">GNED 02</td>
            <td rowspan="2">Ethics</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="ethics_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="ethics_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">GNED 05</td>
            <td rowspan="2">Purposive Communication</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="purposive_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="purposive_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">GNED 11</td>
            <td rowspan="2">Kontekstwalisadong Komunikasyon sa Filipino</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="konteks_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="konteks_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        
        <tr>
            <td rowspan="2">COSC 50</td>
            <td rowspan="2">Discrete Structures I</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="discrete1_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="discrete1_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 21</td>
            <td rowspan="2">Introduction to Computing</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="computing_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="computing_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 22</td>
            <td rowspan="2">Computer Programming I</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="prog1_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="prog1_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
        </tr>

        <tr>
            <td rowspan="2">FITT I</td>
            <td rowspan="2">Movement Enhancemet</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="fitt1_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="fitt1_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">NSTP I</td>
            <td rowspan="2">National Service Training Program I</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text"  value= "<?php echo $firstyear_firstsem_grade;?>" name="nstp1_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text"  value = "<?php echo $firstyear_firstsem_instructor;?>" name="nstp1_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">CVSU 101</td>
            <td rowspan="2">Institutional Orientation</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value= "<?php echo $firstyear_firstsem_grade;?>" name="cvsu_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_firstsem_instructor;?>" name="cvsu_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>1</td>
            <td></td>
        </tr>

        <!-- 1ST YEAR 2ND SEM -->
        <tr>
            <th colspan="7">Second Semester</th>
        </tr>

        <tr>
            <td rowspan="2">GNED 01</td>
            <td rowspan="2">Art Appreciation</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="arts_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="arts_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">GNED 03</td>
            <td rowspan="2">Mathematics in the Modern World</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="math_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="math_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">GNED 06</td>
            <td rowspan="2">Science, Technology and Society</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="science_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="science_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        
        <tr>
            <td rowspan="2">GNED 12</td>
            <td rowspan="2">Dalumat Ng/Sa Filipino</td>
            <td></td>
            <td></td> 
            <td rowspan="2">GNED 11</td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="dalumat_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="dalumat_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 23</td>
            <td rowspan="2">Computer Programming II</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 22</td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="prog2_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="prog2_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
        </tr>

        <tr>
            <td rowspan="2">ITEC 50</td>
            <td rowspan="2">Web Systems and Technologies</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 21</td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="itec_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="itec_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">FITT 2</td>
            <td rowspan="2">Fitness and Exercises</td>
            <td></td>
            <td></td> 
            <td rowspan="2">FITT I</td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="fitt2_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="fitt2_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">NSTP 2</td>
            <td rowspan="2">National Service Training Program II</td>
            <td></td>
            <td></td> 
            <td rowspan="2">NSTP I</td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_grade;?>" name="nstp2_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $firstyear_secondsem_instructor;?>" name="nstp2_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <!-- 2ND YEAR -->

        <tr class = "centered">
            <th scope="col" colspan="7" style ="text-align: center;">SECOND YEAR</th>
        </tr>

        <!-- 2ND YEAR 1ST SEM -->

        <tr>
            <th colspan="7">First Semester</th>
        </tr>

        <tr>
            <td rowspan="2">GNED 04</td>
            <td rowspan="2">Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="babasahin_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="babasahin_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">MATH 1</td>
            <td rowspan="2">Analytic Geometry</td>
            <td></td>
            <td></td> 
            <td rowspan="2">GNED 03</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="analytic_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="analytic_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">COSC 55</td>
            <td rowspan="2">Discrete Structures II</td>
            <td></td>
            <td></td> 
            <td rowspan="2">COSC 50</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="discrete2_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="discrete2_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        
        <tr>
            <td rowspan="2">COSC 60</td>
            <td rowspan="2">Digital Logic Design</td>
            <td></td>
            <td></td> 
            <td rowspan="2">COSC50, DCIT23</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="dld_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="dld_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 50</td>
            <td rowspan="2">Object Oriented Programming</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 23</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="oop_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="oop_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 24</td>
            <td rowspan="2">Information Management</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 23</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="infomanage_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="infomanage_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        
        <tr>
            <td rowspan="2">INSY 50</td>
            <td rowspan="2">Fundamentals of Information Systems</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 21</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="infosystems_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="infosystems_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">FITT 3</td>
            <td rowspan="2">Physical Activities towards Health and Fitness I</td>
            <td></td>
            <td></td> 
            <td rowspan="2">FITT 2</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_grade;?>" name="fitt3_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_firstsem_instructor;?>" name="fitt3_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td></td>
        </tr>

            <!-- 2ND YEAR 2ND SEM -->
        <tr>
            <th colspan="7">Second Semester</th>
        </tr>

        <tr>
            <td rowspan="2">GNED 08</td>
            <td rowspan="2">Understanding the Self</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="uts_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="uts_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">GNED 14</td>
            <td rowspan="2">Panitikang Panlipunan</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="panitikan_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>"  name="panitikan_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">MATH 2</td>
            <td rowspan="2">Calculus</td>
            <td></td>
            <td></td> 
            <td rowspan="2">MATH 1</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="calculus_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="calculus_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        
        <tr>
            <td rowspan="2">COSC 65</td>
            <td rowspan="2">Architecture and Organization</td>
            <td></td>
            <td></td> 
            <td rowspan="2">COSC 60</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="archi_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="archi_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">COSC 70</td>
            <td rowspan="2">Software Engineering I</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT50, DCIT24</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="software1_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="software1_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 25</td>
            <td rowspan="2">Data Structure and Algorithm</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 23</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="dataalgo_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="dataalgo_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 55</td>
            <td rowspan="2">Advanced Database Management System</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT24</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="advdatabase_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="advdatabase_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">FITT 4</td>
            <td rowspan="2">Fitness and Exercises</td>
            <td></td>
            <td></td> 
            <td rowspan="2">FITT 3</td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_grade;?>" name="fitt4_grade" maxlength = "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $secondyear_secondsem_instructor;?>" name="fitt4_instructor" maxlength = "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td></td>
        </tr>

        <!-- 3RD YEAR -->

        <tr class = "centered">
            <th scope="col" colspan="7" style ="text-align: center;">THIRD YEAR</th>
        </tr>

        <!-- 3RD YEAR 1ST SEM -->

        <tr>
            <th colspan="7">First Semester</th>
        </tr>

        <tr>
            <td rowspan="2">MATH 3</td>
            <td rowspan="2">Linear Algebra</td>
            <td></td>
            <td></td> 
            <td rowspan="2">MATH 2</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="algebra_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="algebra_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">COSC 75</td>
            <td rowspan="2">Software Engineering II</td>
            <td></td>
            <td></td> 
            <td rowspan="2">COSC 70</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="software2_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="software2_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>
        </tr>

        <tr>
            <td rowspan="2">COSC 80</td>
            <td rowspan="2">Operating Systems</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 25</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="operating_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="operating_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>
        
        <tr>
            <td rowspan="2">COSC 85</td>
            <td rowspan="2">Networks and Communication</td>
            <td></td>
            <td></td> 
            <td rowspan="2">ITEC 50</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="networks_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="networks_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">COSC 101</td>
            <td rowspan="2">CS Elective I(Computer Graphics and Visual Computing)</td>
            <td></td>
            <td></td> 
            <td rowspan="2">DCIT 23</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="cselective1_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="cselective1_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 26</td>
            <td rowspan="2">Applications Dev't and Emerging Technologies</td>
            <td></td>
            <td></td> 
            <td rowspan="2">ITEC 50</td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_grade;?>" name="applications_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="applications_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>

        <tr>
            <td rowspan="2">DCIT 65</td>
            <td rowspan="2">Social and Professional Issues</td>
            <td></td>
            <td></td> 
            <td rowspan="2"></td>
            <td rowspan="2">< value = "<?php echo $thirdyear_firstsem_grade;?>" name="social_grade" maxlength= "20" required></td>
            <td rowspan="2"><input type="text" value = "<?php echo $thirdyear_firstsem_instructor;?>" name="social_instructor" maxlength= "100" required></td>
        </tr>
        <tr>
            <td>3</td>
            <td></td>
        </tr>

    </table>
</body>
        <td colspan="7"><button type="submit">Submit</button></td>
</form>
        
</html>