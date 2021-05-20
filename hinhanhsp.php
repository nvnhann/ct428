<?php
require 'db.php';
session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
    exit;
}
if (isset($_GET['tensp'])) {
    $sql1 = "SELECT hinhanhsp from sanpham, thanhvien where idtv = id and tendn = '" . $_SESSION['tendn'] . "' and tensp= '" . $_GET['tensp'] . "' ";
    $rs = $conn->query($sql1);
    $row = $rs->fetch_assoc();
    $conn->close();
}

echo "<img style='border-radius: 8px;' width ='200' height='200' src='" . $row['hinhanhsp'] . "'/>";
