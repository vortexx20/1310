<form method="GET">
enter an email address to check it is valid or not <input type="text" name ="a">
<br>
<br>
<input type="submit">
</form>

<?php
function valid_email($email)
{
  $result = trim($email);

 if(filter_var($result, FILTER_VALIDATE_EMAIL))
    echo"ther given email address($email) is valid <br> <br>";
 else
    echo"the give email address ($email) is not valid <br> <br>";
}

$input = $_GET['a']??"test@gmail.com";
echo valid_email($input);
?>