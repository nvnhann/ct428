<?php
if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
require 'db.php';
session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
    exit;
} else {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    $sql1 = "DELETE from sanpham where idsp = " . $_GET['id'] . " AND idtv = '" . $id . "';";
    $conn->query($sql1) or die($conn->error);
    $conn->close();
    header("Location: danhsachsp.php");
}
