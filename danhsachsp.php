<?php
require "db.php";
session_start();
if (!$_SESSION['tendn']) {
    header("Location: dangnhap.php");
} else {
    $sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['tendn'] . "';";
    $rs = $conn->query($sql) or die($conn->error);
    $row = $rs->fetch_assoc();
    $id = $row['id'];
    $sql1 = "SELECT * from sanpham where idtv = " . $id . ";";
    $rs1 = $conn->query($sql1);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        .table1 {
            width: 100%;
            max-width: 100%;
            border-collapse: initial;
            border-spacing: 1px;
        }

        .table1 thead tr {
            background-color: #1d1d1d;
            color: #ffffff;
        }

        .table1 thead tr th,
        .table1 tbody tr td {
            border-style: solid;
            border-width: 0;
        }

        .table1 thead tr th,
        .table1 tbody tr td {
            border-bottom-width: 1px;
            border-color: rgba(0, 0, 0, 0.12);
        }

        .table1 tbody tr td {
            text-align: center;
        }

        #img {
            position: absolute;
            top: 35%;
            left: 35%;
        }
    </style>
</head>

<body>
    <?php require "menu.php" ?>
    <div class="article">
        <div class="content">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div class="input-block">
                <input id="searchsp" name="searchsp" type="text" required placeholder="Tìm kiếm sản phẩm" onkeydown="searchsp(this.value)">
            </div>
            <table class="table1" style="width: 90%;" id="table">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Giá sản phẩm</th>
                        <th colspan="3" class="text-center">Lựa chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($rs1->num_rows) {
                        $count = 1;
                        while ($row1 = $rs1->fetch_assoc()) {
                            $tensp = "'" . $row1['tensp'] . "'";
                            echo '
                            <tr>
                            <td >' . $count++ . '</td>
                            <td style="text-align: left; cursor: pointer;"  onmouseover="hinhanhsp(' . $tensp . ')" onmouseout="clearha()" >' . $row1['tensp'] . '</td>
                            <td>' . $row1['giasp'] .  ' VND</td>
                            <td>
                              <a style="cursor: pointer; text-decoration: underline; color: #6f86d6" onclick="detail(' . $row1['idsp'] . ')">
                                        Xem chi tiết
                                </a>
                            </td>
                            <td><a href="suasp.php?id=' . $row1['idsp'] . '"><img  width="16px" src="./img/edit.png"/></a></td>
                            <td><a href="xoasp.php?id=' . $row1['idsp'] . '"><img width="16px" src="./img/delete.png"/></a></td>
                            </tr>
                            ';
                        }
                    } else {
                        echo ' <tr><td colspan="4">Danh sách sản phẩm trống</td></tr>';
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <div style="margin: 1em 0;">
                <button class="btn btn-primary" style="cursor: pointer" onclick="window.location.href='themsp.php'">
                    Thêm sản phẩm
                </button>
                <button class="btn btn-primary" style="cursor: pointer" onclick="window.location.href='dangxuat.php'">
                    Đăng xuất
                </button>
            </div>
            <div id="detail"></div>
            <div id="img"></div>
        </div>
    </div>
    <script>
        const detail = (val) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // document.getElementById('error').style.display = 'block !important';
                    document.getElementById("detail").innerHTML = this.responseText;

                }
            }
            xmlhttp.open("GET", "chitietsp.php?id=" + val, true);
            xmlhttp.send();
        }

        const searchsp = (val) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // document.getElementById('error').style.display = 'block !important';
                    // document.getElementById("table").innerHTML = '';
                    document.getElementById("table").innerHTML = this.responseText;

                }
            }
            xmlhttp.open("GET", "search.php?s=" + val, true);
            xmlhttp.send();
        }

        const hinhanhsp = (val) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // document.getElementById('error').style.display = 'block !important';
                    // document.getElementById("table").innerHTML = '';
                    document.getElementById("img").innerHTML = this.responseText;

                }
            }
            xmlhttp.open("GET", "hinhanhsp.php?tensp=" + val, true);
            xmlhttp.send();
        }

        const clearha = () => {
            document.getElementById("img").innerHTML = '';
        }
    </script>
</body>

</html>