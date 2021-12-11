<?php
    error_reporting(0);
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    set_time_limit(0);
    
    $titleconfig = "Twitter";
    //ket noi db
    $dbhost = 'localhost';
    $dbname = 'twitter';
    $dbusername = 'root';
    $dbpassword = '';
    //-- Kết Nối PDO --//

    // Kiểm tra kết nối
    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
        $db->exec("set names utf8"); //Set bảng mã
    } catch (PDOException $e) {
        //echo $e->getMessage();
        echo 'Loi ket noi';
        exit;
    }
?>

