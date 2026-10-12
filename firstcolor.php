<?php
function colorfirstletter($text, $color)
{
    $multiword = explode(" ", $text);
    $result = [];

    foreach ($multiword as $word)
    {
        if ($word == "") continue;

        $firstchar = substr($word, 0, 1);
        $rest = substr($word, 1);

        $colored = "<span style='color: $color;'>$firstchar</span>$rest";
        $result[] = $colored;
    }

    return implode(" ", $result);
}

$input = "hello world from php welcome to II CA 'B'";

echo "Original input sentence: $input <br><br>";
echo "First letter colored output: ";
echo colorfirstletter($input, "red");
?>
