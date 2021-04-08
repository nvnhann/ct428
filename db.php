<?php
define('servername', 'us-cdbr-east-03.cleardb.com');
define('username', 'b8edcf65e350d6');
define('password','6f411659');
define('database', 'heroku_3655a29d56982b1');

function execute($sql){
    $conn = new mysqli(servername, username, password, database);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $conn -> set_charset('utf8');
    $conn -> query($sql);
    $conn -> close();
}

function executeResult($sql){
    $conn = new mysqli(servername, username, password, database);
    $conn -> set_charset("utf8");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql) ;
    $list = [];

    while ($row = mysqli_fetch_array($result,1)){
        $list[] = $row;
    }

    $conn->close();

    return $list;
};

function checkUser($user, $pass){
    $sql = "SELECT tendn, matkhau from thanhvien where tendn='".$user."' and matkhau = '".md5($pass)."';";
   if(!empty(executeResult($sql))){
       return true;
   }
   return false;
    
}





