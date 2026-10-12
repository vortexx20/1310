<?php
// Program 14: dbtoxml.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
$table = 'mark_sheet';
$sql = "SELECT * FROM $table";
$result = mysqli_query($conn, $sql);
// Retrieve table data and export to XML
if ($result->num_rows > 0) {
    // Create a new DOM document
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    // Root element
    $root = $doc->createElement($table);
    $doc->appendChild($root);
    while ($row = $result->fetch_assoc()) {
        $rowElement = $doc->createElement('row');
        foreach ($row as $colName => $colValue) {
            $colElement = $doc->createElement($colName, htmlspecialchars($colValue));
            $rowElement->appendChild($colElement);
        }
        $root->appendChild($rowElement);
    }
    // Save XML to a file
    $xmlFileName = "$table.xml";
    $doc->save($xmlFileName);
    echo "Data from '$table' has been successfully exported to $xmlFileName";
} else {
    echo "No records found in the table.";
}
// Close connection
$conn->close();
?>