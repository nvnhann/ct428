<?php
include('db.php');
session_start();
if (!$_SESSION['name']) {
    header("Location: ./03-dangnhap.php");
    exit;
}
if(isset($_GET['tensp'])){
    $sql1 = "SELECT hinhanhsp from sanpham, thanhvien where idtv = id and tendn = '".$_SESSION['name']."' and tensp= '".$_GET['tensp']."' ";
    $listsp = executeResult($sql1);
    
}

echo "<img style='border-radius: 8px;' width ='200' height='200' src='". $listsp[0]['hinhanhsp']."'/>";