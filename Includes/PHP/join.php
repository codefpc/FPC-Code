<?php
$server = 'localhost';
$uname = 'php';
$password = 'SecurePHP1^';

$conn = new mysqli($server, $uname, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$president = "gavinmor2143@flaglercps.org";
$vice = "morgan@thesfcc";
$secretary = "dravenmon0351@flaglercps.org";
$sysadmin = "galvantua@gmail.com";
$email_list = $president.", ".$secretary.", ".$vice.", ".$sysadmin;


if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$grade = $_POST['grade'];
	$header = "From: noreply@codefpc.com";
	$body = $name." has joined Coding Club!: \n\nGrade:	".$grade."\nEmail:	".$email;

	mail($email_list,$subject,$body,$header);
	header("Location: /thanks-join/");

	$sql = "INSERT INTO FPC_Code.Member (Name, Email, Grade_at_Join)
VALUES ('$name', '$email', '$grade')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	header("Location: /sorry/");
}
?>