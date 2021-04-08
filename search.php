<?php
include('db.php');
session_start();
if (!$_SESSION['name']) {
    header("Location: ./03-dangnhap.php");
    exit;
}
if(isset($_GET['s'])){
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['name'] . "';";
    $list = executeResult($sql);
    $sql1 = "SELECT * from sanpham where idtv = " . $list[0]['id'] . " and tensp like  '%" . $_GET['s']. "%';";
    $listsp = executeResult($sql1);

}

echo "
     <table class='table' id='table'>
        <thead>
        <tr>
            <th class='text-center'>STT</th>
            <th class='text-center'>Tên sản phẩm</th>
            <th class='text-center'>Giá sản phẩm</th>
            <th colspan='3' class='text-center'>Lựa chọn</th>
        </tr>
        </thead>
        <tbody>
";


        if (!count($listsp)) {
            echo " <tr><td colspan='4'>Danh sách sản phẩm trống</td></tr>";
        } else {
            $count = 1;
            foreach ($listsp as $value) {
                echo "
                    <tr>
                    <td>" . $count++ . "</td>
                    <td style='text-align: left'>" . $value['tensp'] . "</td>
                    <td>" . $value['giasp'] . "</td>
                    <td><a style='cursor: pointer; text-decoration: underline; color: #6f86d6' onclick='detail(" . $value['idsp'] . ")'>Xem chi tiết</a></td>
                    <td><a href='./03-edit.php?id=" . $value['idsp'] . "'><img  width='16px' src='./img/edit.png'/></a></td>
                    <td><a href='./03-delete.php?id=" . $value['idsp'] . "'><img width='16px' src='./img/delete.png'/></a></td>
                    </tr>
                    ";
            }
        }
        echo "</tbody></table>";