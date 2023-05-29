<?php error_reporting(0); ?>  
<html>


<h1>The Corporate Page</h1>
<h2>Set up Demands</h2>

<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    CID: <input type="text" name="cid">
    Product_id:
    <select name="product_id">
        <option value="w101">w101</option>
        <option value="r101">r101</option>
        <option value="c101">c101</option>
    </select>


    Grade:  
    <select name="grade">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    Qty(KG):<input type="number" name="qty">

    <input type="submit" value="submit" name="submit">
</form>

</html>


<?php 



function getprice($product_id,$grade){
    $servername = "localhost";
    $username = "root";
    $password = "ram123";
    $dbname = "tarp";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select price_kg from price where grade=$grade and product_id='$product_id'";
    $result=$conn->query($sql);

    // $price=intval($result);
    
    // $row = mysqli_fetch_row($result);
    // $price=$row[0];

    $conn->close();


    /////////////////////////
    
// printing table headers
        $price=0;

// printing table rows
        while($row = mysqli_fetch_row($result))
    {
// echo "<tr>";


    foreach($row as $cell)
        $price=$cell;


    }

            return $price;
            }


$cid=$_GET["cid"];
$product_id=$_GET["product_id"];
$grade=$_GET["grade"];
$qty=$_GET["qty"];



// insert($fid,$product_id,$grade,$qty);

///************************************************** */


    $servername = "localhost";
    $username = "root";
    $password = "ram123";
    $dbname = "tarp";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "insert into demand values('$cid','$product_id',$grade,$qty)";
    $result=$conn->query($sql);
    $price=getprice($product_id,$grade);


    echo "<script type='text/javascript'>alert('The price to be paid is $price');</script>"
        

?>
