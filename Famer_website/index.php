<?php error_reporting(0); ?>  
<!-- <?php

$servername = "localhost";
$username = "root";
$password = "ram123";
$dbname = "cyber";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO credentials (Username, Password)
VALUES ('michel', '12121wdasdas')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close()

?> -->



<?php

$servername = "localhost";
$username = "root";
$password = "ram123";
$dbname = "cyber";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "delete from  credentials where username ='michel' ";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close()

?>