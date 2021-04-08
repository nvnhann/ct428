<?php
    if(!isset($_GET['id'])){
        echo "not found";
        exit;
    }
    include('db.php');
    session_start();
    if(!$_SESSION['name']){
        header("Location: ./03-dangnhap.php");
        exit;
    }
    $sql = "SELECT * from thanhvien where tendn= '".$_SESSION['name']."';";
    $list = executeResult($sql);
    $sql1 = "DELETE from sanpham where idsp = ".$_GET['id']." AND idtv = '".$list[0]['id']."';";
      execute($sql1);
      header("Location: ./03-listproducts.php");

