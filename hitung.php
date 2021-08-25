<?php

function LabelBMI($nilai) {
	if ($nilai <= 18.5 ) {
	echo "underweight";
} elseif ($nilai > 18.5 AND $nilai < 25 ) {
	echo "normal";
} else {
	echo "overweight";
}
}


function nilaiBMI($nilaiberat, $nilaitinggi) {
	$BMI = $nilaiberat / pow($nilaitinggi,1);
	$BMI = round($BMI,3);
	echo $BMI;
}


$berat = $_GET["beratbadan"];
$tinggi = $_GET["tinggibadan"] / 100;



nilaiBMI($berat, $tinggi);
LabelBMI($BMI);


?>
