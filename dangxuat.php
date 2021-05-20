<?php
session_start();
Session_destroy();
header("Location: dangnhap.php");
