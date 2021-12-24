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
    $hihi = $db->query("SELECT * FROM `register` WHERE `mail` = '$mail' AND `password` = '" . md5($pass) . "' LIMIT 1")->fetch();
    if ($hihi['id'] != null) {
        $notidone = "Log In Success";
        $notibonus = '.then(function() { window.location.href = "home.php"; })'; // dan ve home
        $_SESSION['user'] = $hihi['id'];
    } else {
        $notifail = "Wrong Email or Password";
    }
}
?>

<div class="login-form">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-0 pt-3">
            <div class="bird-icon">
                <a href="index.php">
                    <i class="fa-brands fa-twitter logo"></i>
                </a>
            </div>
            <h3 class="text-center pt-3">Log in to Twitter</h3>
            <form class="login-form" method="post">
                <div class="mb-3 bg-color">

                    <input type="text" class="form-control" name="email" placeholder="Phone, email, or username" required="required">
                </div>
                <div class="mb-3 bg-color">

                    <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
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
</div>

<?php require_once 'sys/end.php';
