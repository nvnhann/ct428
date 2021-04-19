<?php
require 'db.php';
if (isset($_GET['checkusr'])) {
    $sql = "SELECT * FROM thanhvien WHERE tendn = '" . $_GET['checkusr'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows) {
        echo 'Tên đăng nhập đã tồn tại';
    } else echo '';

    $conn->close();
}
