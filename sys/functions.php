<?php
//function cua web
function locdata($var)
    {
        $data = trim(addslashes(htmlspecialchars($var)));
        return $data;
    } // anti sql injection
<<<<<<< HEAD
=======
    
function mget($name) {
    if (isset($_GET[$name])) {
        return locdata($_GET[$name]);
    } else {
        return "";
    }
}

//get data from post method
function mpost($name) {
    if (isset($_POST[$name])) {
        return locdata($_POST[$name]);
    } else {
        return "";
    }
}

>>>>>>> fa191a29b8e22bc509f32b14ae11752e8a7046cd
?>