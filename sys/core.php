<?php
require_once 'config.php';
require_once 'functions.php';
<<<<<<< HEAD

if (isset($_SESSION['user'])) {
    $userdata = $db->query("SELECT * FROM `register` WHERE `Email` = '" . $_SESSION['user'] . "' ")->fetch();
    if ($userdata == null) {
        session_unset();
        header("Location: ");
        exit;
=======
//print_r($_SESSION);
if (isset($_SESSION['user'])) {
    $userdata = $db->query("SELECT * FROM `register` WHERE `id` = '" . $_SESSION['user'] . "' ")->fetch();
    if ($userdata == null) {
        session_unset();
        header("Location: index.php");
        exit;
    } else {
        $uid = $userdata['id'];
>>>>>>> fa191a29b8e22bc509f32b14ae11752e8a7046cd
    }
}
?>