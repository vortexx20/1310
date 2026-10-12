<?php
// search.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$searchName = $_POST['inputname']; //Input name to find
$dom = new DOMDocument();
$dom->load('collegetree.xml');
$find=0;
$names = $dom->getElementsByTagName('studentname');
foreach ($names as $namelist) {
if ($namelist->nodeValue == $searchName) {
echo "Given inputted Name '".$namelist->nodeValue."' Found in collegetree.xml file";
$find=1;
break;
}
}
if ($find==0)
echo "Given inputted Name '".$searchName."' Not Found in collegetree.xml file";
}
?>