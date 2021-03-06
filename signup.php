<?php
require_once 'sys/head.php';
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}

if (isset($_POST['save'])) {
    $fname = locdata($_POST['f_name']);
    $lname = locdata($_POST['l_name']);
    $mail = locdata($_POST['mail']);
    $pass = locdata($_POST['password']);
    $cpass = locdata($_POST['cpass']);
    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
    if ($fname == "" || $lname == "" || $mail == "" || $pass == "" || $cpass == "") {
        $notifail = "Input data is not enough!!";
    } else if ($pass != $cpass) {
        $notifail = "The entered passwords do not match. Try again.";
    } else if (!preg_match($pattern, $mail)) {
        $notifail = "Email format is incorrect";
    } else {
        $hihi = $db->query("SELECT * FROM `register` WHERE `mail` = '$mail' LIMIT 1")->rowcount();
        if ($hihi != 0) {
            $notifail = "Email already exists in the system";
        } else {
            //thoa man
            $db->query("INSERT INTO `register` (`id`, `uid`, `f_name`, `l_name`, `mail`, `password`, `bio`, `location`, `website`, `following`, `follower`, `posts`, `datejoin`) VALUES (NULL, NULL, '$fname', '$lname', '$mail', '" . hashp($pass) . "', NULL, NULL, NULL, '0', '0', '0', '" . time() . "');");
            $notidone = "Sign Up Success";
            $notibonus = '.then(function() { window.location.href = "login.php"; })';
        }
    }
}
?>
<div class="signup-form">


    <form class="form-container p-1" method="post" enctype="multipart/form-data">
        <div class="bird-icon">
            <a href="index.php">
                <i class="fa-brands fa-twitter logo"></i>
            </a>
        </div>
        <h2>Register</h2>
        <p class="hint-text">Create your account</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="f_name" placeholder="First Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="l_name" placeholder="Last Name" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="mail" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>

        <div class="form-group">
            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" name="save" class="btn btn-info btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Log in</a></div>
    </form>


</div>
<?php require_once 'sys/end.php'; ?>