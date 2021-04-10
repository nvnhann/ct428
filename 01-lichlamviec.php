<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lich hoc</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #e8ecee;
        }

        .content1 {
            width: 60%;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            max-width: 100%;
            border-collapse: initial;
            border-spacing: 1px;
        }

        .table thead tr,
        .table tbody tr td:first-child {
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
            cursor: pointer;
        }

        .table tbody tr td:hover {
            background-color: #F06292 !important;
            transition: 0.4s ease-in-out;
        }
    </style>
</head>

<body>
    <?php require"./menu.php"?>
        <div class="content1">
            <div class="doc-note doc-note--warning" style="width: 30%">
                <b>MSSV:</b> B1809272 <br/> <b> Họ Tên:</b> Nguyễn Văn Nhẫn
            </div>
            <div class="doc-note doc-note--tip text-center" style="font-size: 1.5em; font-weight: bold">
                    <span>
                        Thời khóa biểu học kỳ 2 2020-2021
                   </span>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">Tuần 1</th>
                    <th class="text-center">Thứ hai</th>
                    <th class="text-center">Thứ ba</th>
                    <th class="text-center">Thứ tư</th>
                    <th class="text-center">Thứ năm</th>
                    <th class="text-center">Thứ sáu</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tiết 1</td>
                    <td rowspan="2" style="background-color: #00bcd4; color: #ffffff">Cờ vua</td>
                    <td rowspan="3" style="background-color: #009688; color: #ffffff">Nguyên lý máy học</td>
                    <td></td>
                    <td></td>
                    <td rowspan="3" style="color: #ffffff; background-color: #3f51b5">Điện toán đám mây</td>
                </tr>
                <tr>
                    <td>Tiết 2</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 3</td>
                    <td></td>
                    <td></td>
                    <td rowspan="3" style="color: #ffffff; background-color: #607d8b">Trí tuệ nhân tạo</td>
                </tr>
                <tr>
                    <td>Tiết 4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 6</td>
                    <td></td>
                    <td></td>
                    <td rowspan="3" style="color: #ffffff; background-color: #ff9800">Quản trị hệ thống</td>
                    <td rowspan="3" style="background-color: #f44336; color: #ffffff">Lập trình web</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 7</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 8</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tiết 9</td>
                    <td></td>
                    <td></td>
                    <td style="background-color: #9e9e9e; color: #ffffff">Cố vấn học tập sinh hoạt lớp</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div class="doc-note doc-note--warning">
                <b>CT271</b> - Niên luận cơ sở - CNTT (Cô Lâm Nhựt Khang)
            </div>
        </div>
    </body>
</html>