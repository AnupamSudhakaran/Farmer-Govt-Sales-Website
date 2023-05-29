

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

$sql = "select * from demand";
$result = $conn->query($sql);
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysqli_num_rows($result);

echo "<h2>Price</h2>";
echo "<table border='1' class='table table-dark'><tr>";
// printing table headers
echo "<td>Sn</td>";
for ($i = 0; $i < 4 ; $i++) {
    $field = mysqli_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
$t = 0;
while ($row = mysqli_fetch_row($result)) {
    echo "<tr>";

    echo "<td>$t</td>";
    foreach ($row as $cell)
        echo "<td>$cell</td>";
        // <script type='text/javascript'>  alert('hi')</script>
    echo "</tr>\n";
    $t += 1;
}
echo "</table>";
echo "<br><br>";
?>