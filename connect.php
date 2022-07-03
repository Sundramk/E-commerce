<?php
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Number = $_POST['number'];
	$Text = $_POST['text'];

	// Database connection
	$conn = new mysqli('localhost','root','','data');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into ankit(name, email, number, text) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $number, $text);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Send Successfully..";
		$stmt->close();
		$conn->close();
	}
?>