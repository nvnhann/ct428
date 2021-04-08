<?php
session_start();
Session_destroy();
header("Location:03-dangnhap.php");
exit;