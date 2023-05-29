 <?php error_reporting(0); ?>  


<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="farmer.css">

<div class="box-form">
    <div class="left">
<h1>The Farmer Page</h1>
<img src="images/bg_farm.jpg" style="display: none;">
</div>

<div class="right">
    <h2>Publish your crops</h2>

    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

        <div class="form-floating mb-3">
            <input class="form-control" id="fid" type="text" name="fid" placeholder="FID">
            <label for="fid">FID</label>
        </div>

        <div class="form-floating">

            <select class="form-select" id="product_id" name="product_id">
                <option selected>Choose an option</option>
                <option value="w101">w101</option>
                <option value="r101">r101</option>
                <option value="c101">c101</option>
            </select>
            <label for="product_id">Product ID :</label>
        </div>

        <div class="form-floating">

            <select class="form-select" id="grade" name="grade">
                <option selected>Choose an option</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <label for="grade">Grade :</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="qty" type="number" name="qty" placeholder="QTY">
            <label for="qty">Quantity(Kg)</label>
        </div>

        <button type="submit" class="btn btn-success btn-lg">Submit</button>
    </form>
</div>
</div>

</html>



<?php

//     function get_renum($product_id,$grade){
//         $servername = "localhost";
//         $username = "root";
//         $password = "ram123";
//         $dbname = "tarp";

// // Create connection
//         $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }

//         $sql = "select price_kg from price where grade=$grade and product_id=$product_id";

//         $price=$conn->query($sql);

//         $conn->close()


//         return $price;

//     }

    function insert($fid,$product_id,$grade,$qty){        
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
        // $fid=(string)$fid;
        // $product_id=(string)$fid;
        // $grade=(int)$grade;
        // $qty=(int)$qty;
        $sql="insert into farmer values('$fid','$product_id',$grade,$qty)";

        $sql2="update stock set qty=qty+$qty where product_id='$product_id' and grade='$grade'";


        $conn->query($sql);
        $conn->query($sql2);
        // echo $fid." ".$product_id." ".$grade." ".$qty;
        $conn->close();
    }

    $fid=$_GET["fid"];
    $product_id=$_GET["product_id"];
    $grade=$_GET["grade"];
    $qty=$_GET["qty"];

    

    insert($fid,$product_id,$grade,$qty);

    ///************************************************** */


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



        

        $price*=$qty;


        echo "<script type='text/javascript'>alert('The price to be paid is $price');</script>";


?>