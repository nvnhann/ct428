<?php
include('db.php');

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

if( isset($_POST['tendn']) &&
    isset($_POST['mk']) &&
    isset($_POST['gioitinh']) &&
    isset($_POST['nghenghiep']) &&
    isset($_POST['st'])){

    $tendn = $_POST['tendn'];
    $mk = md5($_POST['mk']);
    $gioitinh = $_POST['gioitinh'];
    $nghenghiep = $_POST['nghenghiep'];
    $st = $_POST['st'];

    $filename = $_FILES['avt']['tmp_name'];
    $destination = "./img/" . getName(6) . $_FILES['avt']['name'];
    move_uploaded_file($filename, $destination);

    $st = '';
    for($i=0; $i < count($st)-1; $i++){
        $st .= $_POST['st'][$i] . ', ';
    }

    $st .= $_POST['st'][count($st)-1];

    $sql = "INSERT INTO thanhvien(tendn, matkhau, hinhanh, gioitinh, nghenghiep, sothich) 
            VALUES ('".$tendn."','".$mk."','".$destination."','".$gioitinh."','".$nghenghiep."','". $st."');";
    
    execute($sql);
    session_start();
    $_SESSION['name'] = $tendn;
    header('Location: ./profiles.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .content1{
            width: 60%;
            margin: 3em auto;
        }
        .form{
            width: 100%;
        }
        table tr td:first-child{
            width: 40%;
            height: 2em;
            text-align: right;
            padding-right: 1em;
        }
        .hidden{
            display: none;
        }
        #error{
            color: red;
        }
    </style>
</head>
<body>
    <?php require"./menu.php" ?>
    <div class="content1">
        <div class="doc-note doc-note--warning" style="width: 30%">
            MSSV: B1809272 <br/>
            Họ Tên: Nguyễn Văn Nhẫn
        </div>
        <div class="form">
            <div class="text-center text-danger" style="font-weight: bold; font-size: 2em">Đăng ký tài khoản mới</div>
            <div class="text-center">Vui lòng điên đầy đủ thông tin bên dưới để đăng ký tài khoản mới</div>
            <form
                    name="dangky"
                    style="width: 60%; margin: 1em auto; background-color: #E0E0E0" 
                    method="POST" 
                    action="02-dangkytk.php" 
                    enctype="multipart/form-data"
                    onsubmit="return validateForm()"
            >
                <table>
                    <tr >
                        <td style=""><label for="tendn">Tên đăng nhập</label></td>
                        <td >
                            <input name="tendn" id="tendn" type="text" onblur="checkUser(this.value)">
                            <div id="error" class="hidden">Tên đăng nhập dã tồn tại</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="mk">Mật khẩu</label></td>
                        <td><input name="mk" id="mk" type="password"></td>
                    </tr>
                    <tr>
                        <td><label for="rmk">Gõ lại mật khẩu</label></td>
                        <td><input name="rmk" id="rmk" type="password"></td>
                    </tr>
                    <tr>
                        <td><label for="hinhdd">Hình đại diện</label></td>
                        <td><input name="avt" id="hinhdd" type="file"></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" name="gioitinh" id="nam" value="Nam"> Nam &nbsp;
                            <input type="radio" name="gioitinh" id="nu" value="Nữ"> Nữ&nbsp;
                            <input type="radio" name="gioitinh" id="khac" value="Khác">Khác
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nn">Nghề nghiệp</label></td>
                        <td>
                            <select name="nghenghiep" id="nn">
                                <option value="Học sinh" selected>Học sinh</option>
                                <option value="Sinh Viên" >Sinh Viên</option>
                                <option value="Giáo viên" >Giáo viên</option>
                                <option value="Khác" >Khác</option>
                             </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sở thích</td>
                        <td>
                            <input  class="sothich"  type="checkbox" name="st[]" id="thethao" value="Thể thao">
                            <label for="thethao">Thể thao</label>
                            <input class="sothich" type="checkbox" name="st[]" id="dulich" value="Du lịch">
                            <label for="dulich">Du lịch</label>
                            <input  class="sothich" type="checkbox" name="st[]" id="amnhac" value="Âm nhạc">
                            <label for="amnhac">Âm nhạc</label>
                            <input type="checkbox" class="sothich" name="st[]" id="thoitrang" value="Thời trang">
                            <label  for="thoitrang">Thời trang</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-bottom: 1em">
                            <button class="btn btn-primary" type="submit">Đăng ký</button>
                            <button class="btn btn-primary" type="reset">Làm lại</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script>
        const checkUser = (usn) =>{
            const xmlhttp = new XMLHttpRequest();
            const err = document.getElementById("error");
            xmlhttp.onreadystatechange = function (){
                if(this.readyState === 4 && this.status === 200){
                   if(this.responseText !== ''){
                       err.classList.remove("hidden");
                   }

                }
            }
            xmlhttp.open("GET","process.php?checkusr="+usn,true);
            xmlhttp.send();
            err.classList.add("hidden");

        }

        const validateForm = () => {
                let  tendn = document.forms['dangky']['tendn'].value;
                let  mk = document.forms['dangky']['mk'].value;
                let  rmk = document.forms['dangky']['rmk'].value;
                let  avt = document.forms['dangky']['avt'].value;
                let  gioitinh = document.forms['dangky']['gioitinh'].value;
                let  nghenghiep = document.forms['dangky']['nghenghiep'].value;
                // let  st = document.forms['dangky']['st[]'].value;
                let st = document.querySelector('input[type="checkbox"]:checked');


            if(tendn === '' || mk === '' || avt === '' || gioitinh === '' || nghenghiep === '' || st === null ){
                alert('Các trường không được bỏ trống');
                return false;
            }

            if(rmk !== mk){
               alert('Mật khẩu không khớp') ;
               return false;
            }

             const tendnRGEX = new RegExp("^([a-zA-Z])[a-zA-Z\d].{6,15}");
            if(!tendnRGEX.test(tendn)){
                alert('Tên đăng nhập không hợp lệ \nbắt đầu phải là chữ cái, theo sau có thể là chữ cái hoặc là số; dài từ 6 đến 15 ký tự!');
                return false;
            }

            const mkRGEX = new RegExp("(?=.*?[A-Za-z])(?=.*?[0-9]).{6,15}$");
            if(!mkRGEX.test(mk)){
                alert('Mật khẩu không hợp lệ \nphải có cả chữ cái và số; không được có ký tự khác ngoài chữ cái và số; dài từ 6 đến 15 ký tự');
                return false;
            }

            if(!document.querySelector("#error").classList.contains('hidden')){
                alert('Tên đăng nhập đã tồn tại');
                return false;
            }
           return true;
        }
    </script>
</body>
</html>
