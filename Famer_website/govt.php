<?php error_reporting(0); ?>  




<script>

    function funct_2(){
        document.getElementById("Div1").innerHTML="";

    }
    function my_function() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //   alert(this.responseText);
        document.getElementById("Div1").innerHTML=this.responseText;
    }
  };
  request.open("GET", "ajax_request.php", true);
  request.send();
}
</script>



<html>
    <input type="submit" value="Show demands" onclick="my_function()">
    <inpuat type="submit" value="Hide Demands" onclick="funct_2()">
    <div id="Div1"></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   


    Enter the Sn for accepting order: <input type=number name="n">
        <input type="submit" value="submit" name="sb1">
</form>


</html>

<?php


function func($t)
{
    $servername = "localhost";
    $username = "root";
    $password = "ram123";
    $dbname = "tarp";
    $info = array();
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


    // printing table headers
    for ($i = 0; $i < $fields_num - 1; $i++) {
        $field = mysqli_fetch_field($result);

    }

    // printing table rows
    $d=0;
    while ($row = mysqli_fetch_row($result)) {



        foreach ($row as $cell)
            if($d==$t)
            array_push($info, $cell);
        $d+=1;
    }


    $sql = "delete from demand where cid='$info[0]' and product_id='$info[1]' and grade=$info[2] and qty=$info[3]";
    $conn->query($sql);

}

function data(){


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

echo "<h2>DEmand table </h2>";
echo "<table border='1'><tr>";
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
}

$n=$_POST["n"];


echo $n;

func($n);









?>

