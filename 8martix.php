<?php 
$table = [
		[1,2,3],
		[4,5,6],
		[7,8,9]
];

$rows = count($table);
$cols = count($table [0]);
echo "rows = $rows "." cols = $cols "."<br>";
echo "<br> Orginal Table :<br>";

foreach ($table as $row){
	echo implode("\t", $row)."<br>";
        }

echo "<br> Row sums; <br>";

for($i=0;$i<$rows;$i++){
	$rowsum = array_sum($table[$i]);
	echo "Row $i sum = $rowsum <br>";
        }

echo "<br> column sum : <br>";

for ($j = 0; $j<$cols; $j++){
	$colsum = 0;
	for($i=0; $i< $rows; $i++){
	   $colsum += $table [$i] [$j];
        }
echo "column $j sum = $colsum <br>";
}
?>
