<?php require_once 'head.php'; ?> 

<ul class="nav flex-column sticky-top" style = "height: 100vh;">
<div class="col">
        <div class="bird-icon h-10">
            <a href="home.php">
                <i class="fa-brands fa-twitter logo"></i>
            </a>

        </div>

        <div class="list-group" id="list-tab" role="tablist">
            <div class="container-fluid col-7 font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="home.php" role="tab"">
                    <img src=" assets/img/home.svg" alt="">
                    Home
                </a>
            </div>
            <div class="container-fluid col-7 font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="explore.php" role="tab">
                    <img src="assets/img/tag.svg" alt="">
                    Explore
                </a>
            </div>
            <div class="container-fluid col-7 font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="sys/profile.php" role="tab">
                    <img src="assets/img/profile.svg" alt="">
                    Profile
                </a>
            </div>

            <div class="container-fluid font-weight-bold">
                <button type="submit" class="btn btn-primary rounded-pill mt-4" style="width:50%">
                    Tweet
                </button>
            </div>


        </div>

    </div>
    <div class="p-2 bd-highlight">
        <div class="container-fluid col-7 font-weight-bold">
            <a href="logout.php" class="btn btn-outline-danger rounded-pill" role="button" style="width:100%">
                Log Out
            </a>
        </div>

    </div>
</ul>