<?php error_reporting(0); ?>


<script>

    function funct_2(){
        document.getElementById("Div1").innerHTML="<br>";

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

<head>
  <style>
  input[type=submit]{
    appearance: none;
    background-color: #2ea44f;
    border: 1px solid rgba(27, 31, 35, .15);
    border-radius: 6px;
    box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
    font-size: 14px;
    font-weight: 600;
    line-height: 20px;
    padding: 6px 16px;
    position: relative;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: middle;
    white-space: nowrap;
  }

  input[type=submit]:focus:not(:focus-visible):not(.focus-visible) {
    box-shadow: none;
    outline: none;
  }

input[type=submit]:hover {
    background-color: #2c974b;
  }

  input[type=submit]:focus {
    box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
    outline: none;
  }

  input[type=submit]:disabled {
    background-color: #94d3a2;
    border-color: rgba(27, 31, 35, .1);
    color: rgba(255, 255, 255, .8);
    cursor: default;
  }

  input[type=submit]:active {
    background-color: #298e46;
    box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
  }
  </style>

</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="govt.css">


<div class="box-form">
    <div class="left">
        <h1 style="font-size: 40">Government Page</h1>

    <img src="govt.jpeg" style="display: none;">
</div>

<div class="right">

    <input type="submit" value="Show demands" onclick="my_function()" >
    <input type="submit" value="Hide Demands" onclick="funct_2()">
    <div id="Div1"><br></div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        Enter the Serial Number for accepting the demand: <input type=number name="n">
            <input type="submit" value="submit" name="sb1" id="btn-1">
    </form>
    </form>


</div>



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
    $sql2= "update stock set qty=qty-$info[3] where product_id='$info[1]' and grade=$info[2]";
    $conn->query($sql);
    $conn->query($sql2);

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
