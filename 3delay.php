<form method="POST">
 enter how many second of delay you need <input type="text" name="a">
 <br>
 <br>
<input type="submit">
</form>

<?php

$delayseconds=$_POST['a']??5;

// output the current time in the 'hour:minute:second' format

echo "welcome to delay program execution for give number of second <br>";

date_default_timezone_set('Asia/calcutta');

echo date('h:i:s');

echo"<br>";

sleep($delayseconds);

echo "<br> now finished $delayseconds seconda delay after sleep<br>";

//output the current time again after waking up

echo date('h:i:s')."<br>:";
?>

