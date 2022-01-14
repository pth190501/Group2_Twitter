<?php
/* footer cua web */
if (isset($notidone)) {
    echo '<script>swal("SUCCESS","' . $notidone . '","success")' . $notibonus . ';</script>'; 
} else if (isset($notifail)) {
    echo '<script>swal("ERROR","' . $notifail . '","error")' . $notibonus . ';</script>';
} // can thoi gian load
?>
</body>
</html>