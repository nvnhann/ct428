<?php
if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
include('db.php');
session_start();
if (!$_SESSION['name']) {
    header("Location: ./03-dangnhap.php");
    exit;
}
$sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['name'] . "';";
$list = executeResult($sql);
$sql1 = "SELECT * from sanpham where idsp = " . $_GET['id'] . " AND idtv = '" . $list[0]['id'] . "';";
$chitietsp = executeResult($sql1);

echo "
    
    
<div style='width: 50em; margin: 1em auto;'>

    <div>
        <h2>Chi tiết sản phẩm</h2>
    </div>
    <div class='doc-note doc-note--tip'>
        <div style='display: flex'>
            <img style='width: 19em; border-radius: 4px; margin-right:0.5em' src='" . $chitietsp[0]['hinhanhsp'] . "' alt=''>
            <div>
                <p><b>Tên sản phẩm:</b> ".$chitietsp[0]['tensp']." </p>
<p><b>Chi tiết:</b> ". $chitietsp[0]['chitietsp']."</p>
<p><b>Giá:</b> ". $chitietsp[0]['giasp']."</p>
</div>
</div>
</div>
</div>


";

