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

$A = nilaiBMI($berat, $tinggi);
$B = LabelBMI($BMI);


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
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$json = $msg;
header('Content-type: application/json');
echo json_encode($json);
mysqli_close($conn);

?>
