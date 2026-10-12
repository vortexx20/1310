<form method="GET">
    Enter a number to check if it is prime:
    <input type="text" name="a">
    <br><br>
    <input type="submit" value="sumbit">
</form>

<?php
$n = $_GET['a'] ?? 5;

echo "<br>Given input number = $n<br><br>";

if ($n == 0) 
{
echo "$n is not a prime number.";
}

elseif($n==1)
 echo"$n is neither prime nor composite";

 else {
    $flag = 0;

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 0) {
        echo "$n is a prime number.";
    } else {
        echo "$n is not a prime number.";
    }
}
?>
