<?php
include('db.php');
if(isset($_GET['checkusr'])){
    $sql = "SELECT * FROM thanhvien WHERE tendn = '".$_GET['checkusr']."'";
    if(!empty(executeResult($sql))){
        echo 'Tên đăng nhập đã tồn tại';
    }else echo '';
}




