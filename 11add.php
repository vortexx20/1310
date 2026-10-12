<!-- Program 9: HTML Form -->
<h4><u>Student Mark Sheet</u></h4>
<form method="post">
Enter Roll Number : <input type="Number" name="Rno" /><br>
Enter Student Name : <input type="Text" name="Name" /><br>
Enter Mark1 : <input type="Number" name="M1" /><br>
Enter Mark2 : <input type="Number" name="M2" /><br>
Enter Mark3 : <input type="Number" name="M3" /><br>
Enter Mark4 : <input type="Number" name="M4" /><br>
<input type="submit" name="submit" value="Add New Records" /><br><br>
</form>
<?php
function viewRecord()
{
    global $conn;
    $sql = "SELECT * From Mark_Sheet";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        echo "";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<pre>";
            echo "Roll Number : " . $row["Roll_No"] . "<br>";
            echo "Student Name : " . $row["Student_Name"] . "<br>";
            echo "Mark1 : " . $row["Mark1"] . "<br>";
            echo "Mark2 : " . $row["Mark2"] . "<br>";
            echo "Mark3 : " . $row["Mark3"] . "<br>";
            echo "Mark4 : " . $row["Mark4"] . "<br>";
            echo "</pre>";
            echo "";
        }
        echo "<br>Fetched Data Successfully";
    }
    else
    {
        echo "No Records";
    }
}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn)
{
    die('Could not Connect MySQL Server: ' . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    echo "<h1>Records before insertion</h1>";
    viewRecord();

    $Rno  = $_POST['Rno'];
    $Name = $_POST['Name'];
    $M1   = $_POST['M1'];
    $M2   = $_POST['M2'];
    $M3   = $_POST['M3'];
    $M4   = $_POST['M4'];

    mysqli_query($conn, "INSERT INTO MARK_SHEET (Roll_No, Student_Name, Mark1, Mark2, Mark3, Mark4)
    VALUES ('$Rno', '$Name', '$M1', '$M2', '$M3', '$M4')") or die(mysqli_error($conn));

    echo "<p align=center>Record Added Successfully</p>";
    echo "<h1>Records after insertion</h1>";
    viewRecord();
    mysqli_close($conn);
}
?>