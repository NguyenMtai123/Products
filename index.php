<?php
     require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Trang chủ</title>
</head>
<body>
    <?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
            case 'product':
                require_once 'sanpham/product.php';
                break;
            case 'add':
                require_once 'sanpham/add.php';
                break;
            case 'edit':
                require_once 'sanpham/edit.php';
                break;
            case 'delete':
                require_once 'sanpham/delete.php';
                break;
            case 'show':
                require_once 'sanpham/show.php';
                break;
            default:
                require_once 'sanpham/product.php';
                break;
        }
    }else{
        require_once 'sanpham/product.php';
    }
    ?>
</body>
</html>
