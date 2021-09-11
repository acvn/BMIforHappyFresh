<?php

//validasi input
function validasi($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//hitung nilai bmi
function nilaibmi($C, $D) {
	$D = $D/100;
	$AA = $C/pow($D, 2);
	$AA = round($AA, 1);
	return $AA;
}

//menentukan status bmi
function statusbmi($E) {
	if ($E >= 1 AND $E <= 18.5 ) {
		$FF = "underweight";
	} elseif ($E > 18.5 AND $E < 25 ) {
		$FF = "normal";
	} elseif ($E >= 25) {
		$FF = "overweight";
	} else {
  $FF = "input salah";
	}
	return $FF;
}

//kirim data
function kirimdata($J, $K){
	$servername = "db";
	$username = "aldi";
	$password = "J4k4rt4!";
	$database = "BMI";
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	if(!$conn) {
		die("connection failed: " . mysqli_connect_error());
	}
	
	$sql = "INSERT INTO databmi (nilaibmi, statusbmi) VALUES (" . $J .  ", '" . $K . "')";
	if (mysqli_query($conn, $sql)) {
		//echo 'Data sudah ditambahkan';
		$msg = array("bmi" => $J , "label" => "$K" );
		$json = $msg;
		header('Content-type: application/json');		
		echo json_encode($json);
	} 
	mysqli_close($conn);
}


//menerima dan menetapkan varibale
$BB = validasi($_GET["beratbadan"]);
$TB = validasi($_GET["tinggibadan"]);


//cek integer dan float
if (filter_var($BB, FILTER_VALIDATE_INT) or filter_var($BB,FILTER_VALIDATE_FLOAT)){
	if (filter_var($TB, FILTER_VALIDATE_INT)) {
		$nilaibmi = nilaibmi($BB, $TB);
		$statusbmi = statusbmi($nilaibmi);
		kirimdata($nilaibmi, $statusbmi);
	}
	elseif (filter_var($TB, FILTER_VALIDATE_FLOAT)){
		$nilaibmi = nilaibmi($BB, $TB);
		$statusbmi = statusbmi($nilaibmi);
		kirimdata($nilaibmi, $statusbmi);
	} else {
		echo "Input ditolak, jangan nakal :)";
	}
} else {
		echo("Input ditolak, jangan nakal :)");
		
}


?>
