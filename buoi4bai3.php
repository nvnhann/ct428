<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Timer</title>
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
                    <h1>Bài 3 - Buổi 4</h1>
                </div>
                <!--end div title-->
                <div id="menu">
                    <!-- chèn menu của sinh viên vào-->
                </div>
                <!--end div menu-->
                <div id="content1">
                    <!--Nội dung trang web-->
                    <h1>Quảng cáo</h1>

                    <a href="http://www.hp.com" target="_blank" id="link">
                        <img style="border-radius: 8px;" id="laptopImg" src="img/hp.jpg" height="300" width="300" onmouseover="stopSlide();" onmouseout="runSlide()" />
                    </a>

                    <p>Yêu cầu:<br />
                        Có 4 hình ảnh của 4 công ty muốn quảng cáo đính kèm. Đầu tiên hiển thị một hình, cứ 2 giây thì thay hình ảnh khác, xoay vòng giữa 4 hình ảnh đã cho.<br />
                        Khi người dùng rê chuột lên hình nào thì hình đó dừng lại không thay đổi để người dùng đọc thông tin về quảng cáo đó,
                        khi nào người dùng rê chuột khỏi thì 2 giây sau mới cho hiển thị hình tiếp theo.<br />
                        Khi người dùng click vào hình nào thì liên kết đến website của hình đó ở cửa sổ mới.
                    </p>
                </div>
                <!--end div content-->
                <div id="footer">
                    <p>Họ tên SV: Nguyễn Văn Nhẫn <br /> Email: Nvnhan.dev@gmail.com </p>
                </div>
                <!--end div footer-->
            </div>
            <!--end div wrap-->
        </div>
    </div>
    <script>
        let IMAGE_PATHS = [];
        IMAGE_PATHS[0] = "img/hp.jpg";
        IMAGE_PATHS[1] = "img/dell.jpg";
        IMAGE_PATHS[2] = "img/acer.jpg";
        IMAGE_PATHS[3] = "img/asus.jpg";

        let LINK = [];

        LINK[0] = "http://www.hp.com";
        LINK[1] = "http://www.dell.com";
        LINK[2] = "http://www.acer.com"
        LINK[3] = "https://www.asus.com";

        function changeSlide() {
            const len = IMAGE_PATHS.length;
            if (typeof(this.i) == 'undefined') {
                this.i = 0;
            }

            this.i++;
            if (this.i > len - 1) {
                this.i = this.i % len;
            }
            console.log(this.i)
            document.getElementById("link").href = LINK[this.i];
            document.getElementById("laptopImg").src = IMAGE_PATHS[this.i];

        }

        let action

        const runSlide = () => {
            action = setInterval("changeSlide()", 2000);
        }

        const stopSlide = () => {
            clearInterval(action);
        }

        runSlide();
    </script>
</body>

</html>