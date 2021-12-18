<?php require_once 'sys/head.php'; ?>
    <div class="container-fluid p-0">

        <div class="col md-12">

            <div class="row">
                <div class="col-md-3 text-center">
                <?php require_once 'sys/left-side.php'; ?>
                </div>

                <div class="col-md-6">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="navbar-brand">
                            <h3>HOME</h3>
                        </div>
                        <div class="navbar-nav ml-md-auto">
                        <button type =" reset " class="border-0 bg-light">
                            <img src="assets/img/star.svg" alt="">
                        </button>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="What's happenning?" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="btn-group mt-1 bg-white" role="group" aria-label="Basic example">
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addimg.svg" alt="">
                            </button>
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addgif.svg" alt="">
                            </button>
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addemoji.svg" alt="">
                            </button>
                            <button type="button" class="btn btn-primary rounded-pill" style ="width:100px">
                                Tweet
                            </button>
                        </div>
                        <div class="container border border-dark mt-2">
                            <img src="assets/img/profile.svg" alt=""> Your Name
                            <h5>Content Status</h5>
                            <div>
                                <img src="assets/img/Back-logo.png" alt="" style ="width:50%">
                            </div>
                            <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                                <button type="button" class="border-0 bg-white">
                                <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                    <i class="far fa-comment"></i>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                <i class="far fa-share-square"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-3">
                    <?php require_once 'sys/right-side.php'; ?>
                </div>
            </div>
            
        </div>

    </div>

<?php require_once 'sys/end.php'; ?>
