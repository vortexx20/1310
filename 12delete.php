<h4><u>Deleting a Record</u></h4>

<form method="post">
    Enter the Roll Number to Delete:
    <input type="number" name="Rno" min="1" required>
    <br><br>
    <input type="submit" name="submit" value="Delete Record">
    <br><br>
</form>

<?php

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Could not Connect MySQL Server: " . mysqli_connect_error());
}

// Select database
if (!mysqli_select_db($conn, $dbname)) {
    die("Database Selection Failed: " . mysqli_error($conn));
}

// Function to display records
function viewRecord()
{
    global $conn;

    $sql = "SELECT Roll_No, Student_Name, Mark1, Mark2, Mark3, Mark4
            FROM Mark_Sheet";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error fetching records: " . mysqli_error($conn);
        return;
    }

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<pre>";
            echo "Roll Number  : " .
                htmlspecialchars((string)$row["Roll_No"]) . "\n";

            echo "Student Name : " .
                htmlspecialchars((string)$row["Student_Name"]) . "\n";

            echo "Mark1        : " .
                htmlspecialchars((string)$row["Mark1"]) . "\n";

            echo "Mark2        : " .
                htmlspecialchars((string)$row["Mark2"]) . "\n";

            echo "Mark3        : " .
                htmlspecialchars((string)$row["Mark3"]) . "\n";

            echo "Mark4        : " .
                htmlspecialchars((string)$row["Mark4"]) . "\n";

            echo "</pre>";
        }

        echo "Fetched Data Successfully.";

    } else {
        echo "No Records Found.";
    }

    mysqli_free_result($result);
}

// Handle delete form submission
if (isset($_POST["submit"])) {

    $Rno = filter_input(
        INPUT_POST,
        "Rno",
        FILTER_VALIDATE_INT,
        ["options" => ["min_range" => 1]]
    );

    if ($Rno === false || $Rno === null) {

        echo "<p>Please enter a valid Roll Number.</p>";

    } else {

        echo "<h2>Records Before Deletion</h2>";

        viewRecord();

        // Delete using a prepared statement
        $sql = "DELETE FROM Mark_Sheet WHERE Roll_No = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {

            echo "<p>Error preparing delete query: " .
                htmlspecialchars(mysqli_error($conn)) . "</p>";

        } else {

            mysqli_stmt_bind_param($stmt, "i", $Rno);

            if (mysqli_stmt_execute($stmt)) {

                $deleted = mysqli_stmt_affected_rows($stmt);

                if ($deleted > 0) {
                    echo "<p>" . $deleted .
                        " Record(s) deleted successfully.</p>";
                } else {
                    echo "<p>No record found with Roll Number: " .
                        htmlspecialchars((string)$Rno) . "</p>";
                }

            } else {

                echo "<p>Error deleting record: " .
                    htmlspecialchars(mysqli_stmt_error($stmt)) . "</p>";
            }

            mysqli_stmt_close($stmt);
        }

        echo "<h2>Records After Deletion</h2>";

        viewRecord();
    }
}

// Close connection
mysqli_close($conn);

?>

