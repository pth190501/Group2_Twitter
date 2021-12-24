<?php
/* footer cua web */
if (isset($notidone)) {
    echo '<script>swal("SUCCESS","' . $notidone . '","success")' . $notibonus . ';</script>'; 
} else if (isset($notifail)) {
    echo '<script>swal("ERROR","' . $notifail . '","error")' . $notibonus . ';</script>';
} // can thoi gian load
?>
<footer>
    <hr class="mt-5">
    <div class="text-center text-muted">
        &copy; 2021 Twitter, Inc.
    </div>
</footer>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>