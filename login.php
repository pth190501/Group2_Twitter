<?php
$tit = "Log In";
require_once 'sys/head.php';
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
if (isset($_POST['login'])) {
    $mail = locdata($_POST['mail']);
    $pass = locdata($_POST['password']);
    $hihi = $db->query("SELECT * FROM register WHERE `mail` = '$mail' AND `password` = '" . md5($pass) . "' LIMIT 1")->rowcount();
    if ($hihi == 1) {
        $notidone = "Log In Success";
        $notibonus = '.then(function() { window.location.href = "home.php"; })'; // dan ve home
        $_SESSION['user'] = $mail;
    } else {
        $notifail = "Wrong Email or Password";
    }
}
?>
<div class="login-form p-2">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 p-0 pt-3">
                <div class="bird-icon">
                    <a href="index.php">
                        <i class="fa-brands fa-twitter logo"></i>
                    </a>
                </div>
                <h3 class="text-center pt-3">Log in to Twitter</h3>
                <form class="login-form" >
                    <div class="mb-3 bg-color">

                        <input type="text" class="form-control" name="mail" placeholder="mail" required="required">
                    </div>
                    <div class="mb-3 bg-color">

                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <button type="submit" name="login" class="btn btn-info btn-lg btn-block mt-3">Log in</button>
                    <div class="text-center pt-3 pb-3">
                        Don't have an account?
                        <a href="signup.php">Register Here</a>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>

<?php require_once 'sys/end.php';