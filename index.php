<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        a {
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }

        ul, li {
            list-style: none;
        }

        body {
            background-color: #e8ecee;
        }

        .menu-top {
            display: flex;
            width: 100vw;
            height: 4.1em;
            line-height: 4em;
            background-color: #1565C0;
            color: #fff;
            position: fixed;
            z-index: 9999;
        }

        .menu-top .menu {
            width: 60vw;
        }

        .menu-top .menu .nav {
            display: flex;
            justify-content: space-between;
        }

        .menu-top .menu .nav .nav-item {
            width: 20vw;
            text-align: center;
            position: relative;;
        }

        .menu-top .menu .nav .nav-item .nav-link {
            color: #fff;
            text-transform: uppercase;
            font-size: 1.2em;
        }

        .menu-top .menu .nav .nav-item:hover {
            background-color: #0D47A1;
            transition: .8s ease-in-out;
        }

        .menu-top .menu .nav .nav-item:hover .menu-con {
            display: block;
        }

        .logo {
            text-transform: uppercase;
            text-align: center;
            width: 30vw;
            font-size: 1.5em;
            font-weight: bold;
            letter-spacing: .1em;
            cursor: pointer;
        }

        .menu-con {
            position: absolute;
            width: 100%;
            background-color: #0D47A1;
            color: #fff;
            display: none;
        }

        .menu-con li {
            text-align: center;
            /* width: 20vw; */
            /* position: absolute; */
            cursor: pointer;
        }

        .menu-con li:hover {
            background-color: #1565C0;
        }

        .menu-con li {
            color: #fff;
        }

        .content {
            display: flex;
            position: absolute;
            width: 60%;
            margin: 5em auto;
        }

        .content .cnt-left {
            width: 30vw;
            position: fixed;
        }

        .content .cnt-right {
            width: 70vw;
            left: 35vw;
            position: relative;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #48c6ef, #6f86d6);
            padding: 3rem 0;
            border-radius: 4px;

        }

        .wrapper {
            background: #eaf6ff;
            padding: 2rem;
            border-radius: 15px;
        }

        h1 {
            font-size: 1.1rem;
            text-align: center;
            text-transform: uppercase;
        }

        .sessions {
            margin-top: 2rem;
            border-radius: 12px;
            position: relative;
        }

        .wrapper li {
            padding-bottom: 1.5rem;
            border-left: 1px solid #abaaed;
            position: relative;
            padding-left: 20px;
            margin-left: 10px;
        }

        .wrapper li:last-child {
            border: 0;
            padding-bottom: 0;
        }

        .wrapper li:before {
            content: '';
            width: 15px;
            height: 15px;
            background: white;
            border: 1px solid #4e5ed3;
            box-shadow: 3px 3px 0 #bab5f8;
            border-radius: 50%;
            position: absolute;
            left: -10px;
            top: 0;
        }

        .time {
            color: #39c0ed;
            font-weight: 700;
        }

        @media screen and (min-width: 601px) {
            .time {
                font-size: 0.9em;
            }
        }

        @media screen and (max-width: 600px) {
            .time {
                margin-bottom: 0.3rem;
                font-size: 0.9em;
            }
        }

        p {
            color: #4f4f4f;
            line-height: 1.5;
            margin-top: 0.4rem;
        }

        @media screen and (max-width: 600px) {
            p {
                font-size: 0.9rem;
            }

            .table tr td {
                font-size: .9em !important;
            }
        }
        .table {
            width: 100%;
            max-width: 100%;
            border-collapse: initial;
            border-spacing: 1px;
        }

        .table tr th,
        .table tr td {
            border-style: solid;
            border-width: 0;
        }

        .table tr td {
            border-bottom-width: 1px;
            border-color: rgba(0, 0, 0, 0.12);
        }

        .table tr td {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div>
    <!-- menutop -->
    <div class="menu-top">
        <div class="logo">Thực hành web</div>
        <div class="menu">
            <ul class="nav">
                <li class="nav-item"><a href="" class="nav-link">Buổi 1</a>
                    <ul class="menu-con">
                        <li onclick="window.location.href='01-lichlamviec.html'">Bài 1</li>
                        <li onclick="window.location.href='02-dangkytk.php'">Bài 2</li>
                        <li onclick="window.location.href='index.php'">Bài 3</li>
                    </ul>
                </li>
                <li class="nav-item"><a href="" class="nav-link">Buổi 2</a>
                    <ul class="menu-con">
                        <li onclick="window.location.href='01-lichlamviec.html'">Bài 1</li>
                        <li onclick="window.location.href='div.html'">Bài 2</li>
                        <li onclick="window.location.href='buoi2-03.html'">Bài 3</li>
                    </ul>
                </li>
                <li class="nav-item"><a href="" class="nav-link">Buổi 3</a>
                    <ul class="menu-con">
                        <li onclick="window.location.href='./02-dangkytk.php'">Bài 1</li>
                        <li onclick="window.location.href='./03-dangnhap.php'">Bài 2</li>
                        <li onclick="window.location.href='./03-addproducts.php'">Bài 3</li>
                        <li onclick="window.location.href='./03-listproducts.php'">Bài 4</li>
                    </ul>
                </li>
                <li class="nav-item"><a href="" class="nav-link">Buổi 4</a></li>
                <li class="nav-item"><a href="" class="nav-link">Buổi 5</a></li>
            </ul>
        </div>
    </div>
    <!-- end menu top -->
    <!-- content -->
    <div class="content">
        <!-- cnt-left -->
        <div class="cnt-left">
            <div class="doc-note doc-note--warning" style="margin-left: 2em; margin-right: 2em">
                <div class="text-center" style="font-weight: bold">SINH VIÊN</div>
                MSSV: <b>B1809272</b> <br/>
                Họ Tên: <b>Nguyễn Văn Nhẫn</b> <br/>
                Lập trình web chiều thứ năm - <b>02</b><br>
                <p>Email: <a href="mailto:Nvnhan.dev@gmail.com">Nvnhan.dev@gmail.com</a> <br></p>
                <p>Sđt: <a href="tel:0794252250">(+84) 79 435 1150</a><br></p>
                <p>Facebook: <a href="https://www.facebook.com/profile.php?id=100012715928356">Nhẫn</a></p>
            </div>
            <div class="doc-note doc-note--tip" style="margin-left: 2em; margin-right: 2em">
                <div class="text-center" style="font-weight: bold">GIẢNG VIÊN HƯỚNG DẪN</div>
                Ths. Nguyễn Cao Hồng Ngọc <br/>
                Email: <a href="mailto:nchngoc@cit.ctu.edu.vn">nchngoc@cit.ctu.edu.vn</a> <br>
            </div>

            <div style="margin:4em auto; text-align: center">
                <img src="./img/logoctu.png" alt="" style="border-radius: 8px">
            </div>
        </div>
        <!-- end cnt-left -->
        <!-- cnt-right -->
        <div class="cnt-right">
            <div class="container">
                <div class="wrapper">
                    <h1 id="head">Kế hoạch học tập 😅</h1>
                    <ul class="sessions">
                        <li>
                            <div class="time">Học Kỳ 1 Năm Học 2018 - 2019 🤯🤯</div>
                            <table class="table">
                                <tr>
                                    <td>QP006</td>
                                    <td>Giáo dục Quốc phòng và An ninh 1 (*)</td>
                                </tr>
                                <tr>
                                    <td>QP007</td>
                                    <td>Giáo dục Quốc phòng và An ninh 2 (*)</td>
                                </tr>
                                <tr>
                                    <td>QP008</td>
                                    <td>Giáo dục Quốc phòng và An ninh 3 (*)</td>
                                </tr>
                                <tr>
                                    <td>QP009</td>
                                    <td>Giáo dục Quốc phòng và An ninh 4 (*)</td>
                                </tr>
                                <tr>
                                    <td>TN001</td>
                                    <td>Vi - tích phân A1</td>
                                </tr>
                                <tr>
                                    <td>TN033</td>
                                    <td>Tin học căn bản</td>
                                </tr>
                                <tr>
                                    <td>TN034</td>
                                    <td>TT. Tin học căn bản</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 2 Năm Học 2018 - 2019 🤷</div>
                            <table class="table">
                                <tr>
                                    <td>CC001</td>
                                    <td>Chứng chỉ Tiếng Anh trình độ A</td>
                                </tr>
                                <tr>
                                    <td>CT101</td>
                                    <td> Lập trình căn bản A</td>
                                </tr>
                                <tr>
                                    <td> KL001</td>
                                    <td>Pháp luật đại cương</td>
                                </tr>
                                <tr>
                                    <td> ML009</td>
                                    <td> Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1</td>
                                </tr>
                                <tr>
                                    <td>TN010</td>
                                    <td>Xác suất thống kê</td>
                                </tr>
                                <tr>
                                    <td>TN012</td>
                                    <td>Đại số tuyến tính và hình học</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ Hè Năm Học 2018 - 2019 🙄</div>
                            <table class="table">
                                <tr>
                                    <td>TN002</td>
                                    <td>Vi - Tích phân A2</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 1 Năm Học 2019 - 2020😵</div>
                            <table class="table">
                                <tr>
                                    <td>CT103</td>
                                    <td>Cấu trúc dữ liệu</td>
                                </tr>
                                <tr>
                                    <td> CT172</td>
                                    <td>Toán rời rạc</td>
                                </tr>
                                <tr>
                                    <td>CT173</td>
                                    <td> Kiến trúc máy tính</td>
                                </tr>
                                <tr>
                                    <td>CT187</td>
                                    <td>Nền tảng công nghệ thông tin</td>
                                </tr>
                                <tr>
                                    <td> KN001</td>
                                    <td> Kỹ năng mềm</td>
                                </tr>
                                <tr>
                                    <td> ML010</td>
                                    <td>Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 2 Năm Học 2019 - 2020🤝</div>
                            <table class="table">
                                <tr>
                                    <td> CT171</td>
                                    <td>Nhập môn công nghệ phần mềm</td>
                                </tr>
                                <tr>
                                    <td> CT174</td>
                                    <td> Phân tích và thiết kế thuật toán</td>
                                </tr>
                                <tr>
                                    <td> CT176</td>
                                    <td>Lập trình hướng đối tượng</td>
                                </tr>
                                <tr>
                                    <td>CT178</td>
                                    <td>Nguyên lý hệ điều hành</td>
                                </tr>
                                <tr>
                                    <td> CT180</td>
                                    <td> Cơ sở dữ liệu</td>
                                </tr>
                                <tr>
                                    <td> ML006</td>
                                    <td> Tư tưởng Hồ Chí Minh</td>
                                </tr>
                                <tr>
                                    <td>TC025</td>
                                    <td> Cờ vua 1 (*)</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ Hè Năm Học 2019 - 2020 🤷</div>
                            <table class="table">
                                <tr>
                                    <td>ML011</td>
                                    <td>Đường lối cách mạng của Đảng cộng sản Việt Nam</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 1 Năm Học 2020 - 2021😹</div>
                            <table class="table">
                                <tr>
                                    <td> CT109</td>
                                    <td> Phân tích và thiết kế hệ thống thông tin</td>
                                </tr>
                                <tr>
                                    <td> CT112</td>
                                    <td>Mạng máy tính</td>
                                </tr>
                                <tr>
                                    <td>CT175</td>
                                    <td>Lý thuyết đồ thị</td>
                                </tr>
                                <tr>
                                    <td>CT181</td>
                                    <td>Hệ thống thông tin doanh nghiệp</td>
                                </tr>
                                <tr>
                                    <td> CT182</td>
                                    <td>Ngôn ngữ mô hình hóa</td>
                                </tr>
                                <tr>
                                    <td>CT237</td>
                                    <td>Nguyên lý hệ quản trị cơ sở dữ liệu</td>
                                </tr>
                                <tr>
                                    <td>CT269</td>
                                    <td>Hệ quản trị cơ sở dữ liệu Oracle</td>
                                </tr>
                                <tr>
                                    <td>CT311</td>
                                    <td>Phương pháp Nghiên cứu khoa học</td>
                                </tr>
                                <tr>
                                    <td>TC026</td>
                                    <td>Cờ vua 2 (*)</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 2 Năm Học 2020 - 2021😵</div>
                            <table class="table">
                                <tr>
                                    <td>CT179</td>
                                    <td>Quản trị hệ thống</td>
                                </tr>
                                <tr>
                                    <td>CT202</td>
                                    <td>Nguyên lý máy học</td>
                                </tr>
                                <tr>
                                    <td>CT233</td>
                                    <td> Trí tuệ nhân tạo</td>
                                </tr>
                                <tr>
                                    <td>CT428</td>
                                    <td> Lập trình Web</td>
                                </tr>
                                <tr>
                                    <td>TC027</td>
                                    <td>Cờ vua 3 (*)</td>
                                </tr>
                                <tr>
                                    <td> CT271</td>
                                    <td> Niên luận cơ sở - CNTT</td>
                                </tr>
                                <tr>
                                    <td> CT233</td>
                                    <td> Điện toán đám mây</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 1 Năm Học 2021 - 2022 🍝</div>
                            <table class="table">
                                <tr>
                                    <td>CT207</td>
                                    <td>Phát triển phần mềm mã nguồn mở</td>
                                </tr>
                                <tr>
                                    <td>CT212</td>
                                    <td> Quản trị mạng</td>
                                </tr>
                                <tr>
                                    <td>CT221</td>
                                    <td> Lập trình mạng</td>
                                </tr>
                                <tr>
                                    <td>CT222</td>
                                    <td> An toàn hệ thống</td>
                                </tr>
                                <tr>
                                    <td>CT466</td>
                                    <td> Niên luận - CNTT</td>
                                </tr>
                                <tr>
                                    <td>CT335</td>
                                    <td>Thiết kế và cài đặt mạng</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ 2 Năm Học 2021 - 2022 🤓</div>
                            <table class="table">
                                <tr>
                                    <td>CT593</td>
                                    <td>Luận văn tốt nghiệp - CNTT</td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div class="time">Học Kỳ Hè Năm Học 2021 - 2022 😴😴😴😴</div>
                            <table class="table">
                                <tr>
                                    <td>CT450</td>
                                    <td>Thực tập thực tế - CNTT</td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                    <div style="width:100%; margin: 1em auto; text-align:center">
                        <button class="btn btn-warning " onclick="window.location.href='#head'" style="cursor: pointer; border-radius: 50%">
                            <span style="font-size: 2em;">&#8593;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cnt-right -->
    </div>
    <!-- end content -->
</div>
</body>
</html>