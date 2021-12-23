<?php require_once 'head.php'; ?>

<ul class="nav flex-column sticky-top" style = "height: 100vh;">
    <div class="mb-auto p-2 bd-highlight">
            <div class="bird-icon h-10">
                <i class="fa-brands fa-twitter logo"></i>
            </div>
            <a class="list-group-item border-0 text-dark" id="list-home-list" data-bs-toggle="list" href="home.php" role="tab">
                <img src="assets/img/home.svg" alt="">
                Home
            </a>
            <a class="list-group-item border-0 text-dark" id="list-home-list" data-bs-toggle="list" href="explore.php" role="tab">
                <img src="assets/img/tag.svg" alt="">
                Explore
            </a>
            <a class="list-group-item border-0 text-dark" id="list-home-list" data-bs-toggle="list" href="sys/profile.php" role="tab">
                <img src="assets/img/profile.svg" alt="">
                Profile
            </a>

                <button type="submit" class="btn btn-primary rounded-pill mt-4" style ="width:50%">
                    Tweet
                </button>
                </div>

    <div class="p-2 bd-highlight">
        <a href="logout.php" class="btn btn-outline-danger" role="button" style ="width:100%">
            Log Out
        </a>
    </div>
</ul>