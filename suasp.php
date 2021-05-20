<?php
require "db.php";
function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
    exit;
}
if (isset($_GET['id'])) {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    $sql1 = "SELECT * from sanpham where idsp = " . $_GET['id'] . " AND idtv = '" . $id . "';";
    $rs1 = $conn->query($sql1);
    $row = $rs1->fetch_assoc();
}
if (isset($_POST['tensp']) || isset($_POST['ctsp']) || isset($_POST['giasp'])) {

    if ($_FILES['hinhsp']['name'] == '') {
        $sql2 = "UPDATE `sanpham` SET `tensp` = '" . $_POST['tensp'] . "', `chitietsp` = '" . $_POST['ctsp'] . "', `giasp` = " . $_POST['giasp'] . " WHERE (`idsp` = '" . $_POST['idsp'] . "');";
    } else {
        $filename = $_FILES['hinhsp']['tmp_name'];
        $destination = "./img/products/" . getName(6) . $_FILES['hinhsp']['name'];
        move_uploaded_file($filename, $destination);
        $sql2 = "UPDATE `sanpham` SET `tensp` = '" . $_POST['tensp'] . "', `chitietsp` = '" . $_POST['ctsp'] . "', `giasp` = " . $_POST['giasp'] . ", hinhanhsp = '$destination' WHERE (`idsp` = '" . $_POST['idsp'] . "');";
    }
    $conn->query($sql2);
    $conn->close();
    header("Location: danhsachsp.php");
    echo $sql2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
</head>

<body>
    <?php require "menu.php" ?>
    <div class="article">
        <div class="content">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div class="form">
                <div class="title-dk">Sửa sản phẩm</div>
                <form action="suasp.php" name="themsp" method="post" enctype="multipart/form-data">
                    <div class="input-block">
                        <label for="tensp">id sản phẩm</label>
                        <input id="idsp" name="idsp" type="number" value="<?php echo $row['idsp'] ?>" readonly required>
                    </div>
                    <div class="input-block">
                        <label for="tensp">Tên sản phẩm</label>
                        <input id="tensp" name="tensp" value="<?php echo $row['tensp'] ?>" type="text" required>
                    </div>
                    <div class="input-block">
                        <label for="ctsp">Chi tiết sản phẩm</label>
                        <textarea id="ctsp" name="ctsp" required><?php echo $row['chitietsp'] ?> </textarea>
                    </div>
                    <div class="input-block">
                        <label for="giasp">Giá sản phẩm</label>
                        <input id="giasp" name="giasp" value="<?php echo $row['giasp'] ?>" type="text" required>
                    </div>
                    <div class="input-block">
                        <label for="file">Hình ảnh sản phẩm</label>
                        <input type="file" name="hinhsp" value="<?php echo $row['hinhanhsp'] ?>" id="file" aria-label="File browser example">
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