<form method="GET">
    Enter a Number:<input type="text" name="n">
    <input type="submit">
</form>

<?php
$input = $_GET['n'] ?? 5;

echo "To find factorial for (default) $input <br><br>";

$factorial = 1;

for ($i = 1; $i <= $input; $i++) 
    $factorial *= $i;

echo "<h1 style='color:red'>Factorial of $input is: $factorial</h1>";
?>