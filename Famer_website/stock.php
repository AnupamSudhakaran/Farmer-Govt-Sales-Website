
<?php error_reporting(0); ?>  
<?php

$servername = "localhost";
$username = "root";
$password = "ram123";
$dbname = "tarp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from price ";
$result = $conn->query($sql);
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysqli_num_rows($result);

echo "<h2>Price</h2>";
echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<3; $i++)
{
    $field = mysqli_fetch_field($result);
    echo "<th>{$field->name}</th>";
}
echo "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    echo "<tr>";


    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
echo "</table>";
echo"<br><br>";


//table 2


$sql = "select * from stock ";
$result = $conn->query($sql);
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysqli_num_rows($result);

echo "<h2>Stock</h2>";
echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    echo "<tr>";


    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
echo "</table>";
echo"<br><br>";




// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close()

?>
</body>
</html>
