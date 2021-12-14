<?php
$tit = "Log In";
require_once 'sys/head.php';
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
if (isset($_POST['login'])) {
    $mail = locdata($_POST['email']);
    $pass = locdata($_POST['pass']);
    $hihi = $db->query("SELECT * FROM register WHERE `Email` = '$mail' AND `Password` = '" . md5($pass) . "' LIMIT 1")->rowcount();
    if ($hihi == 1) {
        $notidone = "Log In Success";
        $notibonus = '.then(function() { window.location.href = "home.php"; })'; // dan ve home
        $_SESSION['user'] = $mail;
    } else {
        $notifail = "Wrong Email or Password";
    }
}
?>
<div class="signup-form">
    <form method="post" enctype="multipart/form-data">
        <h2>Login</h2>
        <p class="hint-text">Enter Login Details</p>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
        <div class="text-center">Don't have an account? <a href="signup.php">Register Here</a></div>
    </form>
</div>
<?php require_once 'sys/end.php';