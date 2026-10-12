<html>
<body>
<h2>To read,display name and email of a person from email.xml file </h2>
<?php
$doc = new DOMDocument();
$doc->load("email.xml");
$personname=$doc->getElementsByTagName("name");
$personemail = $doc->getElementsByTagName("email");
for ($i = 0; $i < $personemail->length; $i++) {
echo $personname->item($i)->nodeValue . " email id is<br>";
echo $personemail->item($i)->nodeValue . "<br><br>";
}
?>
</body>
</html>