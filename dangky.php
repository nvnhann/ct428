<?php
require 'db.php';

function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

if (isset($_POST['tendn']) && isset($_POST['mk'])) {
    $tendn = $_POST['tendn'];
    $mk = md5($_POST['mk']);
    $gioitinh = $_POST['gioitinh'];
    $nghenghiep = $_POST['nghenghiep'];
    $st = $_POST['st'];

    $filename = $_FILES['avt']['tmp_name'];
    $destination = "./img/" . getName(6) . $_FILES['avt']['name'];
    copy($filename, $destination);

    $st1 = '';
    for ($i = 0; $i < count($st) - 1; $i++) {
        $st1 .= $_POST['st'][$i] . ', ';
    }
    $st1 .= $_POST['st'][count($st) - 1];
    $sql = "INSERT INTO thanhvien(tendn, matkhau, hinhanh, gioitinh, nghenghiep, sothich) 
    VALUES ('" . $tendn . "','" . $mk . "','" . $destination . "','" . $gioitinh . "','" . $nghenghiep . "','" . $st1 . "');";
    $conn->query($sql)
        or die($conn->error);
    echo $sql;
    $conn->close();
    header('Location: dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
</head>

<body>
    <?php require "menu.php" ?>
    <div class="article">
        <div class="content">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div class="form">
                <div class="title-dk">Đăng ký tài khoản mới</div>
                <div class="text-center" style="color: rgb(155, 100, 100);">
                    Vui lòng điên đầy đủ thông tin bên dưới để đăng ký tài khoản mới
                </div>
                <form action="dangky.php" name="dangky" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="input-block">
                        <label for="tendn">Tên đăng nhập</label>
                        <input id="tendn" name="tendn" type="text" onblur="checkUser(this.value)">
                        <div id="err0" style="color: red"></div>
                        <div id="err1" style="color: red"></div>
                    </div>
                    <div class="input-block">
                        <label for="mk">Mật khẩu</label>
                        <input id="mk" name="mk" type="password">
                        <div id="err2" style="color: red"></div>
                    </div>
                    <div class="input-block">
                        <label for="rmk">Nhập lại mật khẩu</label>
                        <input id="rmk" name="rmk" type="password">
                        <div id="err3" style="color: red"></div>
                    </div>
                    <div class="input-block">
                        <label for="file">Hình đại diện</label>
                        <input type="file" name="avt" id="file" aria-label="File browser example">
                        <div id="err4" style="color: red"></div>
                    </div>
                    <div class="input-radio">
                        <label>Giới tính</label>
                        <input type="radio" name="gioitinh" id="nam" value="Nam"> Nam &nbsp;
                        <input type="radio" name="gioitinh" id="nu" value="Nữ"> Nữ&nbsp;
                        <input type="radio" name="gioitinh" id="khac" value="Khác">Khác
                        <div id="err5" style="color: red"></div>
                    </div>
                    <div class="input-select">
                        <label for="nn">Nghề nghiệp</label>
                        <select name="nghenghiep" id="nn">
                            <option value="Học sinh">Học sinh</option>
                            <option value="Sinh Viên">Sinh Viên</option>
                            <option value="Giáo viên">Giáo viên</option>
                            <option value="Khác">Khác</option>
                        </select>
                        <div id="err6" style="color: red"></div>
                    </div>
                    <div class="input-radio">
                        <label>Sở thích</label>
                        <input class="sothich" type="checkbox" name="st[]" id="thethao" value="Thể thao">
                        <label for="thethao">Thể thao</label>
                        <input class="sothich" type="checkbox" name="st[]" id="dulich" value="Du lịch">
                        <label for="dulich">Du lịch</label>
                        <input class="sothich" type="checkbox" name="st[]" id="amnhac" value="Âm nhạc">
                        <label for="amnhac">Âm nhạc</label>
                        <input type="checkbox" class="sothich" name="st[]" id="thoitrang" value="Thời trang">
                        <label for="thoitrang">Thời trang</label>
                        <div id="err7" style="color: red"></div>
                    </div>
                    <div style="padding: 1em 0">
                        <button class="btn btn-primary" type="submit">Đăng ký</button>
                        <button class="btn btn-primary" type="reset">Làm lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let flag = true;
        const checkUser = (usn) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText !== '') {
                        flag = false;
                    } else flag = true;
                }
                 document.getElementById('err0').innerText = this.responseText;
            }
            xmlhttp.open("GET", "process.php?checkusr=" + usn, true);
            xmlhttp.send();
        }

        const validateForm = () => {
            const tendn = document.forms['dangky']['tendn'].value;
            const mk = document.forms['dangky']['mk'].value;
            const rmk = document.forms['dangky']['rmk'].value;
            const avt = document.forms['dangky']['avt'].value;
            const gioitinh = document.forms['dangky']['gioitinh'].value;
            const nghenghiep = document.forms['dangky']['nghenghiep'].value;
            const st = document.querySelector('input[type="checkbox"]:checked');
            const tendnRGEX = new RegExp("^[a-zA-Z][a-zA-Z0-9]{5,14}$");
            const mkRGEX = new RegExp("(?=.*?[A-Za-z])(?=.*?[0-9]).{6,15}$");
            if (tendn === '') {
                document.getElementById('err1').innerText = 'Tên đăng nhập không được bỏ trống'
                flag = false;
            } else if (!tendnRGEX.test(tendn)) {
                document.getElementById('err1').innerText = 'Tên đăng nhập không hợp lệ';
                flag = false;
            } else {
                document.getElementById('err1').innerText = '';
            }

            if (mk === '') {
                document.getElementById('err2').innerText = 'Mật khẩu không được bỏ trống';
                flag = false;
            } else if (!mkRGEX.test(mk)) {
                document.getElementById('err2').innerText = 'Mật khẩu không hợp lệ';
                flag = false;
            } else {
                document.getElementById('err2').innerText = '';
            }

            if (rmk === '') {
                document.getElementById('err3').innerText = 'Không được để trống';
                flag = false;
            } else if (mk !== rmk) {
                document.getElementById('err3').innerText = 'Mật khẩu không khớp';
                flag = false;
            } else {
                document.getElementById('err3').innerText = '';
            }

            if (avt === '') {
                document.getElementById('err4').innerText = 'Không được để trống';
                flag = false;
            } else {
                document.getElementById('err4').innerText = '';

            }

            if (gioitinh === '') {
                document.getElementById('err5').innerText = 'Không được để trống';
                flag = false;
            } else {
                document.getElementById('err5').innerText = '';

            }

            if (st === null) {
                document.getElementById('err7').innerText = 'Không được để trống';
                flag = false;
            } else {
                document.getElementById('err7').innerText = '';

            }
            return flag;
        }
    </script>
</body>

</html>