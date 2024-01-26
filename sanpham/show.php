<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Thông tin sản phẩm</title>
</head>
<body>
<div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Thông tin sản phẩm</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="product">
            <?php
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                    include "config/db.php";
                    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id WHERE prd_id=$id";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="info">
                <h3>Tên sản phẩm</h3>
                <p><?php echo $row["prd_name"]; ?></p>
                <h4>Hình ảnh sản phẩm</h4>
                <img style="width:100px; " src="img/<?php echo $row['images']; ?> ">
                <h4>Mô tả sản phẩm</h4>
                <p><?php echo $row["description"]; ?></p>
                <h4>Type</h4>
                <p><?php echo $row["brand_name"]; ?></p>
                <h4>Giá</h4>
                <p><?php echo $row["price"]."vnd"; ?></p>
                </div>
                <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
