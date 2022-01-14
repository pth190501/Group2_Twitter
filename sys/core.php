<?php
require_once 'config.php';
require_once 'functions.php';

if (isset($_SESSION['user'])) {
    $userdata = $db->query("SELECT * FROM `register` WHERE `id` = '" . $_SESSION['user'] . "' ")->fetch();
    if ($userdata == null) {
        session_unset();
        header("Location: index.php");
        exit;
    } else {
        $uid = $userdata['id'];
    }
}
?>