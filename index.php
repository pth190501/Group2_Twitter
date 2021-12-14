<?php require_once 'sys/head.php'; ?>
<?php
    if (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    }
?>  

<section class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-8">
            <img class="img-fluid" src="assets/img/Back-logo.png" alt="Twitter">
        </div>

        <div class="col-lg-4">
            <div class="row pt-5">
                <div class="bird-icon">
                    <i class="fa-brands fa-twitter logo"></i>
                </div>
            </div>

            <div class="row">
                <div class="content1">
                    <span>It's happening right now.</span>
                </div>
            </div>

            <div class="row">
                <div class="content2">
                    <span>Join Twitter today.</span>
                </div>
            </div>

            <div class="container mt-3">
            <a href="signup.php">
                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#signUpModal">
                    Sign up
                </button>
            </a>
            </div>
            <div class="container mt-5">
                <h6>Already have an account?</h6>
                <a href="login.php">
                <button type="button" class="btn btn-info rounded-pill" data-bs-toggle="modal" data-bs-target="#logInModal">
                    Log in
                </button>
                </a>
                

            </div>
        </div>
    </div>
</section>

<?php require_once 'sys/end.php'; ?>