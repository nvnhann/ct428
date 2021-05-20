<?php
require 'db.php';
session_start();
if (!$_SESSION['tendn']) {
    header("Location: .dangnhap.php");
    exit;
}
if (isset($_GET['s'])) {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    $sql1 = "SELECT * from sanpham where idtv = " . $id . " and tensp like  '%" . $_GET['s'] . "%';";
    $rs1 = $conn->query($sql1);
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


if ($rs1->num_rows) {
    $count = 1;
    while ($row1 = $rs1->fetch_assoc()) {
        echo "
                    <tr>
                    <td>" . $count++ . "</td>
                    <td style='text-align: left'>" . $row1['tensp'] . "</td>
                    <td>" . $row1['giasp'] . "</td>
                    <td><a style='cursor: pointer; text-decoration: underline; color: #6f86d6' onclick='detail(" . $row1['idsp'] . ")'>Xem chi tiết</a></td>
                    <td><a href='suasp.php?id=" . $row1['idsp'] . "'><img  width='16px' src='./img/edit.png'/></a></td>
                    <td><a href='xoasp.php?id=" . $row1['idsp'] . "'><img width='16px' src='./img/delete.png'/></a></td>
                    </tr>
                    ";
    }
} else {
    echo " <tr><td colspan='4'>Danh sách sản phẩm trống</td></tr>";
}
echo "</tbody></table>";
