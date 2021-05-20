<?php
if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
require "db.php";

session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
    exit;
} else {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    $sql1 = "SELECT * from sanpham where idsp = " . $_GET['id'] . " AND idtv = '" . $id . "';";
    $rs = $conn->query($sql1) or die($conn->error);
    $row = $rs->fetch_assoc();
    echo '
        <div style="display: flex; margin: 2em;  background: #E9E2D0;
        box-shadow: -20px 0 35px -25px black, 20px 0 35px -25px black;">
        <img style="width: 250px; margin: 1.5em; border-radius: 8px;" src="' . $row['hinhanhsp'] . '" />
            <div>
                 <h2>Chi tiết sản phẩm</h2>
                 <p><b>Tên sản phẩm:</b> ' . $row['tensp'] . '</p>
                 <p><b>Chi tiết: </b> ' . $row['chitietsp'] . '</p>
                <p><b>Giá sản phẩm: </b>' . $row['giasp'] . '</p>
            </div>
        </div>
    ';
    $conn->close();
}
