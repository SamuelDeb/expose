<?php
$places = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
$prenoms = array("Assia","Aisse","Romy","Morgan","Samuel","Karim","Mehdi","David","Siham","Jean-Pierre","Duong","Pahnarith","Wilfred","Mohir","Fidel","Rayan");

$shuffle = array();
for ($i = 0, $size = min(sizeof($places), sizeof($prenoms)); $i < $size; ++$i) {
    $shuffle[] = array($places[$i], $prenoms[$i]);
}

shuffle($shuffle);

foreach ($shuffle as $i => $v) {
    list($places[$i], $prenoms[$i]) = $v; 
}

var_dump($places, $prenoms);


$dateJour = date_create($row[0]);
$date = date_format($dateJour, "d/m/Y_H:i:s");
$filename = 'placement_'.$date.'.csv';

// open csv file for writing
$f = fopen($filename, 'w');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($shuffle as $row) {
	fputcsv($f, $row,':');
}

// close the file
fclose($f);
?>