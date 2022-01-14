<<<<<<< HEAD
<?php require_once 'head.php'; ?>

<<<<<<< HEAD
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
=======
=======
>>>>>>> 11_1951060564_VuVanChuc
<ul class="nav flex-column sticky-top" style="height: 100vh;">
    <div class="col p-0">
        <div class="bird-icon h-10">
            <a href="home.php">
                <i class="fa-brands fa-twitter logo"></i>
            </a>

        </div>

        <div class="list-group" id="list-tab" role="tablist">
            <div class="container-fluid font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="home.php" role="tab">
                    <img src=" assets/img/home.svg" alt="">
                    Home
                </a>
            </div>
            <div class="container-fluid font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="explore.php" role="tab">
                    <img src="assets/img/tag.svg" alt="">
                    Explore
                </a>
            </div>
            <div class="container-fluid font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="list-messages.php" role="tab">
                    <img src="assets/img/message.svg" alt="">
                    Messages
                </a>
            </div>
            <div class="container-fluid font-weight-bold">
                <a class="list-group-item list-group-item-action list-group-item-light border-0 rounded-pill text-dark" id="list-home-list" data-bs-toggle="list" href="profile.php" role="tab">
                    <img src="assets/img/profile.svg" alt="">
                    Profile
                </a>
            </div>
            <script>
                function FocusOnInput() {
                    var element = document.getElementById("floatingTextarea2");
                    element.focus();
                    setTimeout(function() {
                        element.focus();
                    }, 100);
                }
            </script>
            <div class="container-fluid font-weight-bold">
                <button type="submit" class="btn btn-primary rounded-pill mt-4" style="width:50%" onclick="if (window.location.href != 'https://ark.vn/home.php') window.location.href = 'https://ark.vn/home.php'; else FocusOnInput();">
                    Tweet
                </button>
            </div>


        </div>

    </div>
    <div class="p-2 bd-highlight">
        <div class="container-fluid font-weight-bold">
            <a href="logout.php" class="btn btn-outline-danger rounded-pill" role="button" style="width:80%">
                Log Out
            </a>
        </div>

>>>>>>> fa191a29b8e22bc509f32b14ae11752e8a7046cd
    </div>
</ul>