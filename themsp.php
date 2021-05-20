<?php
require "db.php";
session_start();
function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    };
    return $randomString;
}
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
} else {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    if (isset($_POST['tensp'])) {

        $tensp = $_POST['tensp'];
        $ctsp = $_POST['ctsp'];
        $giasp = $_POST['giasp'];


        $filename = $_FILES['hinhsp']['tmp_name'];
        $destination = "./img/products/" . getName(6) . $_FILES['hinhsp']['name'];
        move_uploaded_file($filename, $destination);
        
        $sql = "INSERT INTO `sanpham` (`tensp`, `chitietsp`, `giasp`,`hinhanhsp`, `idtv`) VALUES ('" . $tensp . "', '" . $ctsp . "', $giasp, '" . $destination . "', $id);";
        echo $sql;
        $conn->query($sql);
        $conn->close();
        header('Location: danhsachsp.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <?php require "menu.php" ?>
    <div class="article">
        <div class="content">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div class="form">
                <div class="title-dk">Thêm sản phẩm</div>
                <form action="themsp.php" name="themsp" method="post" enctype="multipart/form-data">
                    <div class="input-block">
                        <label for="tensp">Tên sản phẩm</label>
                        <input id="tensp" name="tensp" type="text" required>
                    </div>
                    <div class="input-block">
                        <label for="ctsp">Chi tiết sản phẩm</label>
                        <textarea id="ctsp" name="ctsp" required> </textarea>
                    </div>
                    <div class="input-block">
                        <label for="giasp">Giá sản phẩm</label>
                        <input id="giasp" name="giasp" type="number" required>
                    </div>
                    <div class="input-block">
                        <label for="file">Hình ảnh sản phẩm</label>
                        <input type="file" name="hinhsp" id="file" aria-label="File browser example">
                    </div>
                    <div style="padding: 1em 0">
                        <button class="btn btn-primary" type="submit">Lưu sản phẩm</button>
                        <button class="btn btn-primary" type="reset">Làm lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>