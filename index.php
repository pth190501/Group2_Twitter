<?php include 'back-end/classes/database.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front-end/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <title></title>
</head>

<section class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-8">
            <img class="img-fluid" src="front-end/assets/img/Back-logo.png" alt="Twitter">
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
                <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#signUpModal">
                    Sign up
                </button>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="signUpModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <div class="bird-icon">
                                <i class="fa-brands fa-twitter logo"></i>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h1 class="pb-3">Create your account</h1>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First name">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last name">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm password">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Sign up</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <h6>Already have an account?</h6>

                <button type="button" class="btn btn-info rounded-pill" data-bs-toggle="modal" data-bs-target="#logInModal">
                    Sign in
                </button>
            </div>

            <!-- The Modal -->
            <div class="modal" id="logInModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <div class="bird-icon">
                                <i class="fa-brands fa-twitter logo"></i>
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h3 class="mb-3">Sign in to Twitter</h3>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="was-validated">
                                <div class="mb-3 mt-3">
                                    <label for="uname" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Sign in</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <hr class="mt-5">
        <div class="text-center text-muted">
            &copy; 2021 Twitter, Inc.
        </div>
    </footer>
</section>