<?php
require "db.php";
session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
} else {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="article">
        <div class="content" style="display: flex; margin: 2em;">
            <img style="width: 250px; margin: 1.5em; border-radius: 8px;" src="<?php echo $row['hinhanh'] ?>" />
            <div>
                <h2><?php echo $row['tendn']; ?></h2>
                <p><b>Nick name:</b> <?php echo $row['tendn'] ?></p>
                <p><b>Giới tính:</b> <?php echo $row['gioitinh'] ?></p>
                <p><b>Nghề nghiệp: </b> <?php echo $row['nghenghiep'] ?></p>
                <p><b>Sở thích: </b> <?php echo $row['sothich'] ?></p>

            </div>
        </div>

        <div style="text-align: center;">
            <button class="btn btn-primary" style="cursor: pointer;" onclick="window.location.href='danhsachsp.php'">Danh sách sản phẩm</button>
            <button class="btn btn-primary" style="cursor: pointer;" onclick="window.location.href='dangxuat.php'">Đăng xuất</button>
        </div>
    </div>
</body>

</html>