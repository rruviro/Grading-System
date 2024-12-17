<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Execute SQL Query</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>

</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Execute SQL Query</h1>

        <form method="post">
            <div class="mb-3">
                <label for="sqlQuery" class="form-label">Enter SQL Query:</label>
                <textarea class="form-control" id="sqlQuery" name="sqlQuery" rows="5"><?php echo isset($_POST['sqlQuery']) ? htmlspecialchars($_POST['sqlQuery']) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Execute</button>
        </form>

        <hr>

        <!-- Display SQL query result -->
        <div class="mt-3">
                <?php
        // Checks if form is submitted and if 'sqlQuery' key is set in $_POST array
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sqlQuery"])) { //  checks if the key sqlQueryis set within the $_POST array
            // Retrieve SQL query from form
            $sqlQuery = $_POST["sqlQuery"];
            // sqlQuery - name of an input field

            // Connect to MySQL database
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

            // Prepare and execute SQL query
            $stmt = $conn->prepare($sqlQuery);
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            if ($result) {
                // Display query result
                if ($result->num_rows > 0) {
                    echo "<h3>Query Result:</h3>";
                    echo "<table class='table table-bordered table-striped'>";
                    // Display column names
                    echo "<tr>";
                    while ($field = $result->fetch_field()) {
                        echo "<th>{$field->name}</th>";
                    }
                    echo "</tr>";

                    // Display query result
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results found.";
                }
            } else {
                echo "Query executed successfully! " . $conn->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
}
?>

        </div>
    </div>
</body>
</html>