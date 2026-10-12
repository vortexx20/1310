
<!-- Program 11: HTML Form -->
<h4><u>Updating a Record</u></h4>
<pre>
<form method="post">
Enter Roll Number : <input type="Number" name="Rno" /><br>
Enter Student Name : <input type="Text" name="Name" /><br>
Enter Mark1 : <input type="Number" name="M1" /><br>
Enter Mark2 : <input type="Number" name="M2" /><br>
Enter Mark3 : <input type="Number" name="M3" /><br>
Enter Mark4 : <input type="Number" name="M4" /><br><br>
<input type="submit" name="submit" value="Update Record" /><br><br>
</form>
</pre>
<?php
function viewRecord()
{
    global $conn;
    $sql = "SELECT * From Mark_Sheet";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<pre>";
            echo "Roll Number : " . $row["Roll_No"] . "<br>";
            echo "Student Name : " . $row["Student_Name"] . "<br>";
            echo "Mark1 : " . $row["MARK1"] . "<br>";
            echo "Mark2 : " . $row["MARK2"] . "<br>";
            echo "Mark3 : " . $row["MARK3"] . "<br>";
            echo "Mark4 : " . $row["MARK4"] . "<br>";
            echo "</pre>";
            echo "-------------------------------------";
        }
    }
    else
    {
        echo "<br>Fetched Data Successfully";
    }
    echo "No Records";
}
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn)
{
    die("Could not Connect MySQL Server: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    echo "<h1>Records before modification</h1>";
    viewRecord();
    $Rno = $_POST['Rno'];
    $Name = $_POST['Name'];
    $M1 = $_POST['M1'];
    $M2 = $_POST['M2'];
    $M3 = $_POST['M3'];
    $M4 = $_POST['M4'];
    $sql = "UPDATE Mark_Sheet SET Student_Name='$Name', Mark1='$M1', Mark2='$M2', Mark3='$M3', Mark4='$M4' WHERE Roll_No='$Rno'";
    $query = mysqli_query($conn, $sql);
    if(!$query)
    {
        echo "Query does not work: " . mysqli_error($conn);
        die;
    }
    else
    {
        echo mysqli_affected_rows($conn) . " Record(s) updated successfully";
    }
    echo "<h1>Records after modification</h1>";
    viewRecord();
    mysqli_close($conn);
}
?>
