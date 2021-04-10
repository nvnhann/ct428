<?php 
include('db.php');
    session_start();
    if(!($_SESSION['name'])){
        header("Location:03-dangnhap.php");
    }
    $sql = "SELECT hinhanhsp, tensp from sanpham, thanhvien where idtv = id and tendn='".$_SESSION['name']."' ";
    $list = executeResult($sql);

   

?>


<!DOCTYPE html>
<html>
<head> 
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		#wrap{
			padding: 2em;
		}
		img{
			border-radius: 8px;
		}
	</style>

<script>let IMAGE_PATHS = [];</script>

<?php
    echo '<script>';
    $j =0;
    foreach($list as $i){
        echo "IMAGE_PATHS[".$j++."]= '".$i['hinhanhsp']."'; ";
    }

    echo '</script>';
?>
<script>

// bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao



function changeSlide(pos) {
// sinh vien tu viet code cho changeSlide:
// pos = 1: hien thi file anh tiep theo 
// pos = -1: hien thi file anh truoc do
	const len = IMAGE_PATHS.length;
	if(typeof(this.i) == 'undefined'){
		this.i = 0;
	}

	this.i += pos;
	if(this.i > len-1 && this.i >0 ){
		this.i=this.i%len;
	}

	if(this.i <0){
		this.i = len - Math.abs(this.i)
		
	}
	//console.log(this.i)
	document.getElementById("laptopImg").src = IMAGE_PATHS[this.i];

}

function chooseSlide(pos) {
	document.getElementById("laptopImg").src = IMAGE_PATHS[pos];
}

</script>

</head>	
<body>
	<?php require "./menu.php" ?>
<div id="wrap">
	<div id="title">
		<h1>Bài 2 - Buổi 4</h1>
	</div> <!--end div title-->
	<div id="menu">
		<!-- chèn menu của sinh viên vào-->
	</div> <!--end div menu-->
	<div id="content">
		<!--Nội dung trang web-->
		<h1>Slide show</h1>
	
		<form>
			<img id="laptopImg" src="<?php echo $list[0]['hinhanhsp'] ?>" height="300" width="300" />
			<br/>
			<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
			<input type="button" name="next" value="Next" onclick="changeSlide(1)">
			<br/>
			<select name="laptopSel" onchange="chooseSlide(this.value)">
				<?php 
                    $j = 0;
                    foreach ($list as $i){
                        echo "<option value = '".$j++."'> ".$i['tensp']." </option>";
                    };                        
                ?>
			</select> 
		</form>
        <p>
		Cải tiến bài 2 để các hình ảnh hiển thị là các hình ảnh lấy ra từ bảng sanpham của người dùng đã đăng nhập.<br/>
        Giải thích: Chọn Buổi 3 - Bài 2 để đăng nhập (đã thực hiện ở buổi 3). Nếu đăng nhập thành công thì khi chọn Buổi 4 - Bài 4 mới có thể xem hình ảnh các sản phẩm của mình theo quy cách của Buổi 4 - Bài 2.
		</p>
	</div> <!--end div content-->
	<div id="footer">
		<p>Họ tên SV: Nguyễn Văn Nhẫn <br/> Email: nvnhan.dev@gmail.com </p>
	</div> <!--end div footer-->
</div> <!--end div wrap-->


</body>
</html>