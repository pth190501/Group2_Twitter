<?php require_once 'sys/head.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
?>

<section class="container-fluid p-0 ">
    <div class="flex-container">

        <div class="flex-item-left p-0" style="background-image:url('https://abs.twimg.com/sticky/illustrations/lohp_1302x955.png');">
            <img class ="bird_logo" src="http://pngimg.com/uploads/twitter/twitter_PNG15.png" alt="">
        </div>

        <div class="flex-item-right text-center">
            <div class="bird-icon">
                <a href="index.php">
                    <i class="fa-brands fa-twitter logo"></i>
                </a>

            </div>
            <div class="content1">
                <span>It's happening right now.</span>
            </div>
            <div class="content2">
                <span>Join twitter today.</span>
            </div>


            <a href="signup.php">
                <button type="button" class="btn btn-primary rounded-pill">
                    Sign up
                </button>
            </a>


            <h6 class = "pt-5 pb-1">Already have an account?</h6>


            <a href="login.php">
                <button type="button" class="btn btn-info rounded-pill" >
                    Log in
                </button>
            </a>

        </div>

    </div>
</section>

<?php require_once 'sys/end.php'; ?>