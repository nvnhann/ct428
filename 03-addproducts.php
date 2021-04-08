<?php
include('db.php');

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

;
session_start();
if (!$_SESSION['name']) {
    header("Location:03-dangnhap.php");
    exit;
}

$sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['name'] . "';";
$list = executeResult($sql);

if (isset($_POST['tensp'])) {
    $tensp = $_POST['tensp'];
    $ctsp = $_POST['ctsp'];
    $giasp = $_POST['giasp'];


    $filename = $_FILES['hinhsp']['tmp_name'];
    $destination = "./img/products/" . getName(6) . $_FILES['hinhsp']['name'];
    move_uploaded_file($filename, $destination);
    $idtv = $list[0]['id'];
    $sql = "INSERT INTO `sanpham` (`tensp`, `chitietsp`, `giasp`,`hinhanhsp`, `idtv`) VALUES ('" . $tensp . "', '" . $ctsp . "', $giasp, '" . $destination . "', $idtv);";
    // echo $sql;
    execute($sql);
    header('Location: ./03-listproducts.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div style="width: 50em; margin: 1em auto;">
    <div class="doc-note doc-note--warning">
        <p>MSSV: B1809272 <br/> Họ Tên: Nguyễn Văn Nhẫn</p>
    </div>
    <form style="width: 60%; margin: 1em auto; background-color: #E0E0E0"
          method="POST"
          action="./03-addproducts.php"
          enctype="multipart/form-data">
        <table>
            <tr>
                <td style=""><label for="tensp">Tên sản phẩm</label></td>
                <td><input name="tensp" id="tensp" type="text"></td>
            </tr>
            <tr>
                <td><label for="ctsp">Chi tiết sản phẩm</label></td>
                <td><textarea name="ctsp" id="ctsp" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><label for="giasp">Giá sản phẩm</label></td>
                <td><input name="giasp" id="giasp" type="text"></td>
            </tr>
            <tr>
                <td><label for="hinhsp">Hình ảnh sản phẩm</label></td>
                <td><input name="hinhsp" id="hinhsp" type="file"></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-bottom: 1em">
                    <button class="btn btn-primary" type="submit">Lưu sản phẩm</button>
                    <button class="btn btn-primary" type="reset">Làm lại</button>
                </td>
            </tr>
        </table>
    </form>
    <button class="btn btn-warning " onclick="window.location.href='./index.php'" style="cursor: pointer;">Trang chủ</button>
</div>
</body>
</html>