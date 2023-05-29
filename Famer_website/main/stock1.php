<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stock.css">
    <title>STOCKS</title>

</head>

<body> 
    
    <section class="intro " style="background-image: url('images\\f1.jpg') ;" >
        <h1>Current Price details</h1>
        <div class="bg-image h-100"  >
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Product_id</th>
                                                    <th>Grade</th>
                                                    <th>Price/kg</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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

                                                while ($row = mysqli_fetch_row($result)) {
                                                    echo "<tr>";
                                                    foreach ($row as $cell)
                                                        echo "<td>$cell</td>";
                                                    echo "</tr>\n";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Current Stock details</h1>
        </div>
        <div class="bg-image h-100" style="background-image: url('images\\f2.jpg') ;">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Product_ID</th>
                                                    <th>Product_name</th>
                                                    <th>Grade</th>
                                                    <th>Product_Quantity</th>

                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                $sql = "select * from stock ";
                                                $result = $conn->query($sql);
                                                if (!$result) {
                                                    die("Query to show fields from table failed");
                                                }

                                                while ($row = mysqli_fetch_row($result)) {
                                                    echo "<tr>";
                                                    foreach ($row as $cell)
                                                        echo "<td>$cell</td>";
                                                    echo "</tr>\n";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>