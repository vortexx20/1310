<form method="POST">
    Enter your five digit phone number in words:
    <input type="text" name="a">
    <br><br>
    <input type="submit">
</form>

<?php

function word_digit($word)
{
    echo "The given input word is ($word)<br>";

    $worr = explode(' ', $word);
    $result = '';

    foreach ($worr as $value)
    {
        switch (trim($value))
        {
            case 'zero':
                $result .= '0';
                break;

            case 'one':
                $result .= '1';
                break;

            case 'two':
                $result .= '2';
                break;

            case 'three':
                $result .= '3';
                break;

            case 'four':
                $result .= '4';
                break;

            case 'five':
                $result .= '5';
                break;

            case 'six':
                $result .= '6';
                break;

            case 'seven':
                $result .= '7';
                break;

            case 'eight':
                $result .= '8';
                break;

            case 'nine':
                $result .= '9';
                break;

            case 'ten':
                $result .= '10';
                break;
        }
    }

    return "The output digit for the given ($word) is $result<br>";
}
$inputword = $_POST["a"] ?? "";
echo word_digit($inputword);

?>
