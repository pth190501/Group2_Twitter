<?php
    session_start();
<<<<<<< HEAD
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    header("Location: login.php");
=======
    session_destroy();
    header("Location: index.php");
>>>>>>> fa191a29b8e22bc509f32b14ae11752e8a7046cd
?>