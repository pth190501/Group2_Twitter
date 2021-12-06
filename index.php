<?php include 'back-end/shared/hearder.php'; ?>

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
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            
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