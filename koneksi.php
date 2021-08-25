 <?php
$servername = "localhost";
$username = "keju";
$password = "J4k4rt4!";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

?>

