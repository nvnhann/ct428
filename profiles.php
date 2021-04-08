
<?php 
include('db.php');
    session_start();
    if(!($_SESSION['name'])){
        header("Location:03-dangnhap.php");
    }
    $sql = "SELECT * from thanhvien where tendn= '".$_SESSION['name']."';";
    $list = executeResult($sql);
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="width: 50em; margin: 1em auto;">
        <div class="doc-note doc-note--warning">
                <p>MSSV: B1809272 <br/> Họ Tên: Nguyễn Văn Nhẫn</p>
        </div>
        <div class="doc-note doc-note--tip">
            <div class="text-center" style="font-size: 1.5em; margin: 1em">
                <span>Chào bạn </span> <span><b><?php echo $list[0]['tendn'];?></b></span>
            </div> 
            <div style="display: flex">
                 <?php echo "<img style='width: 19em; border-radius: 4px; margin-right:0.5em' src='".$list[0]['hinhanh']."' alt=''>";?>
                <div>
                        <p><b>Nick name:</b> <?php echo $list[0]['tendn'];?></p>
                        <p><b>Giới tính:</b> <?php echo $list[0]['gioitinh'];?></p>
                        <p><b>Nghề nghiệp:</b> <?php echo $list[0]['nghenghiep'];?></p>
                        <p><b>Sở thích:</b> <?php echo $list[0]['sothich'];?></p>
                </div>
            </div>
        </div> 
        <button class="btn btn-primary" style="cursor: pointer"  
        onclick="window.location.href='./03-listproducts.php'">Danh sách sản phẩm</button>
        <button class="btn btn-primary" style="cursor: pointer"  
        onclick="window.location.href='./03-logout.php'">Đăng xuất</button>
        <button class="btn btn-warning " onclick="window.location.href='./index.php'" style="cursor: pointer;">Trang chủ</button>
    </div>
</body>
</html>