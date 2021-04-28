<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Image Rollovers</title>
    <script>
        // bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao
        let IMAGE_PATHS = [];
        IMAGE_PATHS[0] = "img/hp.jpg";
        IMAGE_PATHS[1] = "img/dell.jpg";
        IMAGE_PATHS[2] = "img/acer.jpg";
        IMAGE_PATHS[3] = "img/asus.jpg";

        function chooseSlide(pos) {
            document.getElementById("laptopImg").src = IMAGE_PATHS[pos];

        }

        function changeSlide(pos) {
            const len = IMAGE_PATHS.length;
            if (typeof(this.i) == 'undefined') {
                this.i = 0;
            }

            this.i += pos;
            if (this.i > len - 1 && this.i > 0) {
                this.i = this.i % len;
            }

            if (this.i < 0) {
                this.i = len - Math.abs(this.i)

            }
            document.getElementById("laptopImg").src = IMAGE_PATHS[this.i];
            document.getElementById("laptopSel").value = this.i;



        }

        function chooseSlide(pos) {
            document.getElementById("laptopImg").src = IMAGE_PATHS[pos];

        }
    </script>
</head>

<body>
    <?php require "menu.php" ?>
    <div class="article">
        <div class="content">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br /> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div id="wrap">
                <div id="title">
                    <h1>Bài 2 - Buổi 4</h1>
                </div>
                <!--end div title-->
                <div id="content1">
                    <!--Nội dung trang web-->
                    <h1>Slide show</h1>

                    <form>
                        <img id="laptopImg" src="img/hp.jpg" height="300" width="300" style="border-radius: 8px;" />
                        <br />
                        <div style="margin: 1em 0;">
                            <input class="btn btn-primary" type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
                            <input class="btn btn-primary" type="button" name="next" value="Next" onclick="changeSlide(1)">
                        </div>
                        <br />
                        <select name="laptopSel" id='laptopSel' onchange="chooseSlide(this.value)">
                            <option value="0">HP</option>
                            <option value="1">Dell</option>
                            <option value="2">Acer</option>
                            <option value="3">Asus</option>
                        </select>
                    </form>
                    <p>Yêu cầu:<br />
                        Có 4 hình ảnh về máy tính đính kèm, mặc định hiển thị hình máy HP.<br />
                    <ul>
                        <li>Khi người dùng nhấn Next thì hiển thị hình tiếp theo (theo thứ tự Hp -> Dell -> Acer -> Asus).</li>
                        <li>Khi người dùng nhấp Previous thì hiển thị hình trước đó.</li>
                        <li>Cả nút Next và Previous đều hiển thị vòng tròn (nếu đang xem hình HP mà nhấn Previous thì sẽ chuyển sang hình Asus).</li>
                        <li>Người dùng có thể chọn xem một hình nào đó từ danh sách bên dưới nút Previous và Next.</li>
                        <li>Khi người dùng thay đổi hình bằng cách nhấn Previous hoặc Next thì tên hiển thị bên dưới cũng thay đổi theo.</li>
                    </ul>
                    </p>
                </div>
                <!--end div content-->
                <div id="footer">
                    <p>Họ tên SV: Nguyễn Văn Nhẫn <br /> Email: nvnhan.dev@gmail.com </p>
                </div>
                <!--end div footer-->
            </div>
            <!--end div wrap-->
        </div>
    </div>
</body>

</html>