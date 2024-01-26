<?php

    //require_once 'config/db.php';
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqLi_query($connect, $sql_brand);
    try{
    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];
        $image = $_FILES['images']['name'];
        $image_tmp = $_FILES['images']['tmp_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];
        $sql = "INSERT INTO products (prd_name, images, price,quantity, description, brand_id ) VALUES ('$prd_name' ,'$image' ,'$price', '$quantity' , '$description' , '$brand_id')";
        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp,'img/'.$image);
        header('location: index.php?page_layout=product');
    }
    }catch(Exception $exp){
        echo $exp->getMessage() . '<br>';
        echo 'File: ' . $exp->getFile() . '<br>';
        echo 'Line: ' . $exp->getLine() . '<br>';
    }
?>
.<div class="container-fluid" style="width:1000px">
    .<div class="card">
        <div class="card-header">
            <h2 style="text-align: center;">Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" style="width: 930px">
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" name="prd_name" class="form-control" placeholder="Name " required>
                </div>
                <div class="form-group">
                  <label for="">Ảnh sản phẩm</label><br>
                  <input type="file" name="images">
                </div>
                <div class="form-group">
                  <label for="">Giá sản phẩm</label>
                  <input type="number" name="price" class="form-control" placeholder="Giá thành" required>
                </div>
                <div class="form-group">
                  <label for="">Số lượng sản phẩm</label>
                  <input type="number" name="quantity" class="form-control" placeholder="Số lượng sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="">Mô tả sản phẩm</label>
                  <input type="text" name="description" class="form-control" placeholder="Mô tả sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="">Thương hiệu</label>
                  <select class="form-control" name="brand_id">
                    <?php
                        while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                            <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                       <?php } ?>
                  </select>
                </div>
                <button type="submit" name="sbm" class="btn btn-success">Add</button>
                <button style="background-color: rgb(36, 166, 36);position: absolute;  right: 25px;  width: 55px; height: 40px;  border-radius: 5px;  padding: 5px;"><a style="text-decoration: none;color:white" href="index.php">Back</a></button>
            </form>
        </div>
    </div>
</div>
