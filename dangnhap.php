<?php
session_start();
require "db.php";
$err = '';
if (isset($_POST['tendn']) && isset($_POST['mk'])) {
    $tendn = $_POST['tendn'];
    $mk = md5($_POST['mk']);
    $sql = "SELECT tendn from thanhvien where tendn='" . $tendn . "' and matkhau = '" . $mk . "';";
    $result = $conn->query($sql) or die($conn->error);
    if ($result->num_rows) {
        $_SESSION['tendn'] = $tendn;
        header('Location: ./thongtin.php');
        exit;
    } else {
        $err = 'Tên đăng nhập hoặc mật khẩu không đúng';
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <?php require 'menu.php'; ?>
</body>

<div class="article">
    <div class="content">
        <div class="doc-note doc-note--warning" style="width: 30%">
            <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
        </div>
        <div class="form">
            <div class="title-dk">Đăng nhập</div>
            <div class="text-center" style="color: rgb(155, 100, 100);">
                <?php echo $err; ?>
            </div>
            <form action="dangnhap.php" name="dangnhap" method="post" enctype="multipart/form-data">
                <div class="input-block">
                    <label for="tendn">Tên đăng nhập</label>
                    <input id="tendn" name="tendn" type="text" required>
                </div>
                <div class="input-block">
                    <label for="mk">Mật khẩu</label>
                    <input id="mk" name="mk" type="password" required>
                </div>
                <div style="padding: 1em 0">
                    <button class="btn btn-primary" type="submit">Đăng nhập</button>
                    <button class="btn btn-primary" type="reset" onclick="window.location.href='dangky.php'">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>