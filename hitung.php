<?php

// fungsi output nilai BMI
function nilaiBMI($nilaiberat, $nilaitinggi) {
	global $BMI;
	$BMI = $nilaiberat / pow($nilaitinggi,2);
	$BMI = round($BMI,1);
	return $BMI;
}


//fungsi output label BMI
function LabelBMI($nilai) {
	if ($nilai >= 1 AND $nilai <= 18.5 ) {
  $xx = "underweight";
	return $xx;
} elseif ($nilai > 18.5 AND $nilai < 25 ) {
	$xx = "normal";
	return $xx;
} elseif ($nilai >= 25) {
	$xx = "overweight";
	return $xx;
} else {
	$xx = "input salah";
	return $xx;
}
}


//validasi input
function validasi($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


//menerima data dari html form
$berat = validasi($_GET["beratbadan"]);	
$tinggi = validasi($_GET["tinggibadan"] / 100);


//Cek angka atau tidak
if (filter_var($berat, FILTER_VALIDATE_INT) or filter_var($berat,FILTER_VALIDATE_FLOAT)){
  if (filter_var($tinggi, FILTER_VALIDATE_INT)) {
		$A = nilaiBMI($berat, $tinggi);
		$B = LabelBMI($BMI);
  }
  elseif (filter_var($tinggi, FILTER_VALIDATE_FLOAT)){
		$A = nilaiBMI($berat, $tinggi);
		$B = LabelBMI($BMI);
  }
  else {
    echo "Input ditolak";
  }
}
else {
  echo(" Input ditolak");
}


//koneksi ke mysql
$servername = "localhost";
$username = "aldi";
$password = "J4k4rt4!";
$database = "BMI";
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn) {
	die("connection failed: " . mysqli_connect_error());
}


//kirim data
$sql = "INSERT INTO databmi (nilaibmi, statusbmi) VALUES (" . $A .  ", '" . $B . "')";

if ($conn->query($sql)) {
	$msg = array("bmi" => $A , "label" => "$B");
	$json = $msg;
	header('Content-type: application/json');
	echo json_encode($json);
} else {
	echo "<br>" . "JSON tidak di parsing";
}

mysqli_close($conn);

?>
