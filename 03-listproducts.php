<?php
include('db.php');
session_start();
if (!$_SESSION['name']) {
    header("Location: ./03-dangnhap.php");
    exit;
}

$sql = "SELECT * from thanhvien where tendn= '" . $_SESSION['name'] . "';";
$list = executeResult($sql);

$sql1 = "SELECT * from sanpham where idtv = " . $list[0]['id'] . ";";
$listsp = executeResult($sql1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table {
            width: 100%;
            max-width: 100%;
            border-collapse: initial;
            border-spacing: 1px;
        }

        .table thead tr {
            background-color: #1d1d1d;
            color: #ffffff;
        }

        .table thead tr th,
        .table tbody tr td {
            border-style: solid;
            border-width: 0;
        }

        .table thead tr th,
        .table tbody tr td {
            border-bottom-width: 1px;
            border-color: rgba(0, 0, 0, 0.12);
        }

        .table tbody tr td {
            text-align: center;
        }

        #img{
            position: absolute;
            top: 35%;
            left: 9%;
        }
    </style>
</head>
    <body>
        <?php require"./menu.php" ?>
        <div style="width: 50em; margin: 1em auto;">
            <div class="doc-note doc-note--warning">
                <p>MSSV: B1809272 <br/> Họ Tên: Nguyễn Văn Nhẫn</p>
            </div>
            <div class="text-center" style="font-size: 1.5em; border-bottom: 1px dashed black">
                <span>Chào bạn </span> <span><b><?php echo $list[0]['tendn']; ?></b></span>
            </div>
            <div>Danh sách sản phẩm của bạn:</div>
            <div>
                <input type="text" style="width: 100%; margin: 1em" name="" id="" placeholder="Tìm kiếm sản phẩm"
                    onkeydown="searchsp(this.value)"/>
            </div>
            <table class="table" id="table">
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
                if (!count($listsp)) {
                    echo ' <tr><td colspan="4">Danh sách sản phẩm trống</td></tr>';
                } else {
                    $count = 1;
                    foreach ($listsp as $value) {
                        $tensp = "'".$value['tensp']."'";
                        echo '
                            <tr>
                            <td>' . $count++ . '</td>
                            <td style="text-align: left;"  onmouseover="hinhanhsp('. $tensp .')" onmouseout="clearha()" >' . $value['tensp'] .'</td>
                            <td>' . $value['giasp'] . '</td>
                            <td>
                              <a style="cursor: pointer; text-decoration: underline; color: #6f86d6" onclick="detail(' . $value['idsp'] . ')">
                                        Xem chi tiết
                                </a>
                            </td>
                            <td><a href="./03-edit.php?id='. $value['idsp'] .'"><img  width="16px" src="./img/edit.png"/></a></td>
                            <td><a href="./03-delete.php?id='. $value['idsp'].'"><img width="16px" src="./img/delete.png"/></a></td>
                            </tr>
                            ';
                    }
                }
                ?>

                </tbody>
            </table>
            <button class="btn btn-primary" style="cursor: pointer"
                    onclick="window.location.href='./03-addproducts.php'">Thêm sản phẩm
            </button>
            <button class="btn btn-primary" style="cursor: pointer"
                    onclick="window.location.href='./03-logout.php'">Đăng xuất
            </button>
            <div id="detail"></div>
            <div id="img"></div>
        </div>
        <script>
            const detail = (val) => {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        // document.getElementById('error').style.display = 'block !important';
                        document.getElementById("detail").innerHTML = this.responseText;

                    }
                }
                xmlhttp.open("GET", "03-details.php?id=" + val, true);
                xmlhttp.send();
            }

            const searchsp = (val) => {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        // document.getElementById('error').style.display = 'block !important';
                        // document.getElementById("table").innerHTML = '';
                        document.getElementById("table").innerHTML = this.responseText;

                    }
                }
                xmlhttp.open("GET", "search.php?s=" + val, true);
                xmlhttp.send();
            }

            const hinhanhsp = (val) =>{
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        // document.getElementById('error').style.display = 'block !important';
                        // document.getElementById("table").innerHTML = '';
                        document.getElementById("img").innerHTML = this.responseText;

                    }
                }
                xmlhttp.open("GET", "mouseimg.php?tensp=" + val, true);
                xmlhttp.send();
            }

            const clearha = () =>{
                document.getElementById("img").innerHTML = '';
            }

        </script>
    </body>
</html>