<?php
    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query = mysqli_query($connect,$sql);
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 style="text-align: center;">Danh sách sản phẩm</h2>
        </div>
        <div class="card-body">
        <a class="btn btn-primary" href="index.php?page_layout=add">Thêm sản phẩm</a><br><br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                     while($row = mysqli_fetch_assoc($query)){?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['prd_name']; ?></td>
                        <td>
                            <img style="width:100px; " src="img/<?php echo $row['images']; ?> ">
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['brand_name']; ?></td>
                        <td>
                           <button> <a class="" href="index.php?page_layout=show&id=<?php echo $row['prd_id'];?>">Show</a></button>
                        </td>
                        <td>
                            <button><a class="" href="index.php?page_layout=edit&id=<?php echo $row['prd_id'];?>">Edit</a></button>
                        </td>
                        <td>
                            <button><a class="" onclick="return Del('<?php echo $row['prd_name']; ?>')" href="index.php?page_layout=delete&id=<?php echo $row['prd_id'];?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name +  " ?");
    }
</script>
