<?php
//function cua web
function locdata($var)
    {
        $data = trim(addslashes(htmlspecialchars($var)));
        return $data;
    } // anti sql injection
?>