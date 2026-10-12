<form method="GET">
 Enter which table <input type="text" name="a">
 <br>
 <br>
 enter length of the table <input type="text" name="b">
 <br>
 <br>
 <input type="submit">
</form>

<?php
$table = $_GET['a'] ?? 5;
$len = $_GET['b'] ?? 8;

echo "length of table=$len <br><br>";
echo "Multiplication table for: $table<br>";

for($i=1; $i<=$len; $i++)
{
    echo "<br>";
    $res = $i * $table;
    echo "$i * $table = $res";
}
?>