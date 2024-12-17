<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        .search-form {
            margin-top: 20px;
        }
        .search-input {
            width: 300px;
        }
        .search-btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">CHECKLIST OF COURSES</h2>
    <h3>Search Results</h3>

    <form action="search.php" method="GET" class="search-form">
        <div class="input-group">
            <input type="text" name="query" class="form-control search-input" placeholder="Search courses..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            <button type="submit" class="btn btn-primary search-btn">Search</button>
        </div>
    </form>
    
    <?php
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "checklistofcoursesdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve search query from the form
        $query = isset($_GET['query']) ? $_GET['query'] : '';

        // Perform SQL query across relevant tables
        $sql = "SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade FROM firstyear_firstsem WHERE course_title LIKE '%$query%' OR course_code LIKE '%$query%' OR prof_instructor LIKE '%$query%' OR final_grade LIKE '%$query%'
        UNION
        SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade FROM firstyear_secondsem WHERE course_title LIKE '%$query%' OR course_code LIKE '%$query%' OR prof_instructor LIKE '%$query%' OR final_grade LIKE '%$query%'
        UNION
        SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade FROM secondyear_firstsem WHERE course_title LIKE '%$query%' OR course_code LIKE '%$query%' OR prof_instructor LIKE '%$query%' OR final_grade LIKE '%$query%'
        UNION
        SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade FROM secondyear_secondsem WHERE course_title LIKE '%$query%' OR course_code LIKE '%$query%' OR prof_instructor LIKE '%$query%' OR final_grade LIKE '%$query%'
        UNION
        SELECT course_code, course_title, credit_unit_lecture, credit_unit_laboratory, pre_requisite, prof_instructor, final_grade FROM thirdyear_firstsem WHERE course_title LIKE '%$query%' OR course_code LIKE '%$query%' OR prof_instructor LIKE '%$query%' OR final_grade LIKE '%$query%'
        UNION
        SELECT student_number AS course_code, name_of_student AS course_title, NULL AS credit_unit_lecture, NULL AS credit_unit_laboratory, address AS pre_requisite, NULL AS prof_instructor, NULL AS final_grade FROM student_information WHERE name_of_student LIKE '%$query%'
        OR student_number LIKE '%$query%'
        OR address LIKE '%$query%'
        OR name_of_adviser LIKE '%$query%'";

        // LIKE - performs pattern matching
        // '%$query%' - PHP variable within the SQL string, contains the search query entered by the user.

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Count and output total results
            $count = $result->num_rows;
            echo "<p><b>Total results: $count</b></p>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<table class='table table-bordered table-striped'>";
                echo "<tr>";
                echo "<th>Course Code</th>";
                echo "<th>Course Title</th>";
                echo "<th>Credit Unit (Lecture)</th>";
                echo "<th>Credit Unit (Laboratory)</th>";
                echo "<th>Pre-requisite</th>";
                echo "<th>Professor/Instructor</th>";
                echo "<th>Final Grade</th>";
                echo "</tr>";

                    // Reset the result pointer to the beginning of the result set
                    mysqli_data_seek($result, 0);
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["course_code"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course_title"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["credit_unit_lecture"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["credit_unit_laboratory"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["pre_requisite"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["prof_instructor"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["final_grade"]) . "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                
            }
        } else {
            echo "<p>0 results</p>";
        }

        // Close database connection
        $conn->close();
    ?>

</div>
</body>
</html>