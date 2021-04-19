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
    move_uploaded_file($filename, $destination);

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
                        <input id="tendn" name="tendn" type="text" required onblur="checkUser(this.value)">
                        <div id="error" class="hidden">Tên đăng nhập dã tồn tại</div>
                    </div>
                    <div class="input-block">
                        <label for="mk">Mật khẩu</label>
                        <input id="mk" name="mk" type="password" required>
                    </div>
                    <div class="input-block">
                        <label for="rmk">Nhập lại mật khẩu</label>
                        <input id="rmk" name="rmk" type="password" required>
                    </div>
                    <div class="input-block">
                        <label for="file">Hình đại diện</label>
                        <input type="file" name="avt" id="file" aria-label="File browser example">
                    </div>
                    <div class="input-radio">
                        <label>Giới tính</label>
                        <input type="radio" name="gioitinh" id="nam" value="Nam"> Nam &nbsp;
                        <input type="radio" name="gioitinh" id="nu" value="Nữ"> Nữ&nbsp;
                        <input type="radio" name="gioitinh" id="khac" value="Khác">Khác
                    </div>
                    <div class="input-select">
                        <label for="nn">Nghề nghiệp</label>
                        <select name="nghenghiep" id="nn">
                            <option value="Học sinh" selected>Học sinh</option>
                            <option value="Sinh Viên">Sinh Viên</option>
                            <option value="Giáo viên">Giáo viên</option>
                            <option value="Khác">Khác</option>
                        </select>
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
        const checkUser = (usn) => {
            const xmlhttp = new XMLHttpRequest();
            const err = document.getElementById("error");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText !== '') {
                        err.classList.remove("hidden");
                    }

                }
            }
            xmlhttp.open("GET", "process.php?checkusr=" + usn, true);
            xmlhttp.send();
            err.classList.add("hidden");
        }

        const validateForm = () => {
            let tendn = document.forms['dangky']['tendn'].value;
            let mk = document.forms['dangky']['mk'].value;
            let rmk = document.forms['dangky']['rmk'].value;
            let avt = document.forms['dangky']['avt'].value;
            let gioitinh = document.forms['dangky']['gioitinh'].value;
            let nghenghiep = document.forms['dangky']['nghenghiep'].value;
            let st = document.querySelector('input[type="checkbox"]:checked');


            if (tendn === '' || mk === '' || avt === '' || gioitinh === '' || nghenghiep === '' || st === null) {
                alert('Các trường không được bỏ trống');
                return false;
            }

            if (rmk !== mk) {
                alert('Mật khẩu không khớp');
                return false;
            }

            //  const tendnRGEX = new RegExp("^([a-zA-Z])[a-zA-Z\d].{6,15}");
            // if(!tendnRGEX.test(tendn)){
            //     alert('Tên đăng nhập không hợp lệ \nbắt đầu phải là chữ cái, theo sau có thể là chữ cái hoặc là số; dài từ 6 đến 15 ký tự!');
            //     return false;
            // }

            // const mkRGEX = new RegExp("(?=.*?[A-Za-z])(?=.*?[0-9]).{6,15}$");
            // if(!mkRGEX.test(mk)){
            //     alert('Mật khẩu không hợp lệ \nphải có cả chữ cái và số; không được có ký tự khác ngoài chữ cái và số; dài từ 6 đến 15 ký tự');
            //     return false;
            // }

            if (!document.querySelector("#error").classList.contains('hidden')) {
                alert('Tên đăng nhập đã tồn tại');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>