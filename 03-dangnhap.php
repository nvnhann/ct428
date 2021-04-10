<?php 
    include("db.php");
    if(isset($_POST['tendn']) && isset($_POST['mk'])){
        if(checkUser($_POST['tendn'],$_POST['mk'])){
            session_start();
            $_SESSION['name'] = $_POST['tendn'];
            header('Location: ./profiles.php');
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <style>
    form h1 {
      text-align: center;
      box-sizing: border-box;
    }

    input {
      margin: 40px auto;
      width: 80%;
      display: block;
      border: none;
      padding: 10px 0;
      border-bottom: solid 1px #1abc9c;
      transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
      background-position: -200px 0;
      background-size: 200px 100%;
      background-repeat: no-repeat;
      color: #4B515D;
    }

    input:focus,
    input:valid {
      box-shadow: none;
      outline: none;
      background-position: 0 0;
    }

    input:focus::input-placeholder,
    input:valid::nput-placeholder {
      color: #4B515D;
      /* font-size: 22px; */
      transform: translateY(-20px);
      visibility: visible !important;
    }

    button {
      border: none;
      background: #1abc9c;
      cursor: pointer;
      border-radius: 3px;
      padding: 6px;
      width: 200px;
      color: white;
      margin-left: 25px;
      box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    button:hover {
      box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
    }

    .form {
      width: 50%;
      margin: 5em auto;
      padding: 2em;
      background-image: linear-gradient(120deg, #a1c4fd 0, #c2e9fb 100%);
      border-radius: 15px;
    }
  </style>
</head>

<body>
  <?php require "./menu.php" ?>
  <div class="form">
    <form action="03-dangnhap.php" method="post">
      <h1>Đăng nhập</h1>
      <input placeholder="Tên đăng nhập" type="text" name="tendn" required="">
      <input placeholder="Mật khẩu" type="password" name="mk" required="">
      <div style="text-align:center">
        <button type="submit">Đăng nhập</button>
        <button onclick="window.location.href='./02-dangkytk.php'">Đăng ký</button>
      </div>
    </form>

  </div>

</body>

</html>