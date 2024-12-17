<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Checklist of Courses</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
    <style>
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dee2e6; /* Previous border style */
            padding-bottom: 10px; /* Previous margin */
            margin-bottom: 20px; /* Previous margin */
        }
        .search-box {
            margin-top: 1px;
        }
       
        header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0;
        }
        header h2 {
            font-size: 2rem;
            margin-top: 0;
        }
        header h3, header h4, header h5 {
            font-size: 1.5rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .table-container {
            margin-top: 20px; 
        }
        table {
            width: 100%;
        }
        table td, table th {
            padding: 8px; 
        }
     
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-md-9">
                <header class="text-center">
                    <h1 class="text-center">Republic of the Philippines</h1>
                    <h2 class="text-center">CAVITE STATE UNIVERSITY</h2>
                    <h3 class="text-center">Bacoor City Campus</h3>
                    <h4 class="text-center">BACHELOR OF SCIENCE IN COMPUTER SCIENCE</h4>
                    <h5 class="text-center">CHECKLIST OF COURSES</h5>
                </header>
            </div>
        </div>
        
        <!-- Main Content -->

        <div class="search-container">
            <a class="btn btn-primary mb-3" href="/Grade-Management/query.php" role="button" style="visibility: hidden">Execute SQL Query</a>
            <div class="search-box">
                <form action="search.php" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-striped">

        <?php
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

        $sql = "SELECT 
        firstyear_firstsem.firstyear_firstsem_id,
        firstyear_firstsem.course_code AS firstyear_firstsem_course_code,
        firstyear_firstsem.course_title AS firstyear_firstsem_course_title,
        firstyear_firstsem.credit_unit_lecture AS firstyear_firstsem_credit_unit_lecture,
        firstyear_firstsem.credit_unit_laboratory AS firstyear_firstsem_credit_unit_laboratory,
        firstyear_firstsem.pre_requisite AS firstyear_firstsem_pre_requisite,
        firstyear_firstsem.prof_instructor AS firstyear_firstsem_prof_instructor,
        firstyear_firstsem.final_grade AS firstyear_firstsem_final_grade,
        si.student_info_id,
        si.student_number,
        si.name_of_student,
        si.address,
        si.date_of_admission,
        si.contact_number,
        si.name_of_adviser
        FROM 
        firstyear_firstsem AS firstyear_firstsem
        LEFT JOIN 
        student_information AS si ON firstyear_firstsem.student_info_id = si.student_info_id;
        ";

        // Execute query
        $result = $conn->query($sql);

        if (!$result) {
            die("Error executing query: " . $conn->error);
        }

        if ($result->num_rows == 0) {
            echo "No results found.";
        } else {
            $row = $result->fetch_assoc(); // Fetch the first row
            # STUDENT INFORMATION
            // Assuming $row is the result from your database query
            echo '<table class="table table-bordered table-striped">';
            echo '<tr>';
            echo '<td><b>Student Number: </b></td><td>' . $row["student_number"] . '</td>';
            echo '<td><b>Date of Admission: </b></td><td>' . $row["date_of_admission"] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td><b>Name of Student: </b></td><td>' . $row["name_of_student"] . '</td>';
            echo '<td><b>Contact Number: </b></td><td>' . $row["contact_number"] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td><b>Address: </b></td><td>' . $row["address"] . '</td>';
            echo '<td><b>Name of Adviser: </b></td><td>' . $row["name_of_adviser"] . '</td>';
            echo '</tr>';
            echo '</table>';

            echo '<table class="table table-bordered table-striped">';
            echo '<tr>';
            echo '<th>Course Code</th>';
            echo '<th>Course Title</th>';
            echo '<th>Credit Unit - Lec</th>';
            echo '<th>Credit Unit - Lab</th>';
            echo '<th>Pre-requisite</th>';
            echo '<th>Prof/Instructor</th>';
            echo '<th>Final Grade</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="7"><strong>First Year - First Semester</strong></td>';
            echo '</tr>';

            // Reset the result pointer to the beginning of the result set
            mysqli_data_seek($result, 0);

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["firstyear_firstsem_course_code"] . '</td>'; // course_code from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_course_title"] . '</td>'; // course_title from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_credit_unit_lecture"] . '</td>'; // credit_unit_lecture from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_credit_unit_laboratory"] . '</td>'; // credit_unit_laboratory from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_pre_requisite"] . '</td>'; // pre_requisite from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_prof_instructor"] . '</td>'; // prof_instructor from firstyear_firstsem table
                echo '<td>' . $row["firstyear_firstsem_final_grade"] . '</td>'; // final_grade from firstyear_firstsem table
                echo '</tr>';
            }
            
            
            $sql = "SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade
            FROM firstyear_secondsem";
            $result = $conn->query($sql);

            echo '<td colspan="7"><strong>First Year - Second Semester</strong></td>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["course_code"] . '</td>'; // course_code from firstyear_firstsem table
                echo '<td>' . $row["course_title"] . '</td>'; // course_title from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_lecture"] . '</td>'; // credit_unit_lecture from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_laboratory"] . '</td>'; // credit_unit_laboratory from firstyear_firstsem table
                echo '<td>' . $row["pre_requisite"] . '</td>'; // pre_requisite from firstyear_firstsem table
                echo '<td>' . $row["prof_instructor"] . '</td>'; // prof_instructor from firstyear_firstsem table
                echo '<td>' . $row["final_grade"] . '</td>'; // final_grade from firstyear_firstsem table
                echo '</tr>';
            }

            $sql = "SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade
            FROM secondyear_firstsem";
            $result = $conn->query($sql);

            echo '<td colspan="7"><strong>Second Year - First Semester</strong></td>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["course_code"] . '</td>'; // course_code from firstyear_firstsem table
                echo '<td>' . $row["course_title"] . '</td>'; // course_title from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_lecture"] . '</td>'; // credit_unit_lecture from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_laboratory"] . '</td>'; // credit_unit_laboratory from firstyear_firstsem table
                echo '<td>' . $row["pre_requisite"] . '</td>'; // pre_requisite from firstyear_firstsem table
                echo '<td>' . $row["prof_instructor"] . '</td>'; // prof_instructor from firstyear_firstsem table
                echo '<td>' . $row["final_grade"] . '</td>'; // final_grade from firstyear_firstsem table
                echo '</tr>';
            }

            
            $sql = "SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade
            FROM secondyear_secondsem";
            $result = $conn->query($sql);

            echo '<td colspan="7"><strong>Second Year - Second Semester</strong></td>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["course_code"] . '</td>'; // course_code from firstyear_firstsem table
                echo '<td>' . $row["course_title"] . '</td>'; // course_title from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_lecture"] . '</td>'; // credit_unit_lecture from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_laboratory"] . '</td>'; // credit_unit_laboratory from firstyear_firstsem table
                echo '<td>' . $row["pre_requisite"] . '</td>'; // pre_requisite from firstyear_firstsem table
                echo '<td>' . $row["prof_instructor"] . '</td>'; // prof_instructor from firstyear_firstsem table
                echo '<td>' . $row["final_grade"] . '</td>'; // final_grade from firstyear_firstsem table
                echo '</tr>';
            }

            $sql = "SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade
            FROM thirdyear_firstsem";
            $result = $conn->query($sql);

            echo '<td colspan="7"><strong>Third Year - First Semester</strong></td>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["course_code"] . '</td>'; // course_code from firstyear_firstsem table
                echo '<td>' . $row["course_title"] . '</td>'; // course_title from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_lecture"] . '</td>'; // credit_unit_lecture from firstyear_firstsem table
                echo '<td>' . $row["credit_unit_laboratory"] . '</td>'; // credit_unit_laboratory from firstyear_firstsem table
                echo '<td>' . $row["pre_requisite"] . '</td>'; // pre_requisite from firstyear_firstsem table
                echo '<td>' . $row["prof_instructor"] . '</td>'; // prof_instructor from firstyear_firstsem table
                echo '<td>' . $row["final_grade"] . '</td>'; // final_grade from firstyear_firstsem table
                echo '</tr>';
            }
            echo '</table>';
        }
        $conn->close();
        ?>
        </table>
    </div>
</body>
</html>