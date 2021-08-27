<?php
include "components/head.php"
?>

<body>
    <header class="bg-darkBlue p-4">

        <h1 class="text-center text-white"><?= $title ?></h1>

        <?php
        if ($_SESSION["user"]->getUserId() != null) {
        ?>

            <nav class="d-flex justify-content-end m-2 theNav">
                <div class="dropdown">
                    <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> <?= $_SESSION["user"]->getUserUsername() ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?controller=filmSessions&action=bookedSessions"><i class="fas fa-list-ul"></i> My booked Sessions</a></li>
                        <li><a class="dropdown-item" href="index.php?controller=users&action=signOut"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                    </ul>
                </div>
            </nav>

        <?php
        }
        ?>

    </header>


    <div class="container">


        <main class="m-3"><?= $content ?></main>

    </div>

    <footer class="p-5 mt-5 bg-darkBlue">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Contact</h3>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Address:</span>
                        <br>
                        <span>City:</span>
                        <br>
                        <span>Country:</span>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Social</h3>
                    <p>
                        <i class="fab fa-facebook-square"></i>
                        <span>Facebook:</span>
                        <br>
                        <i class="fab fa-instagram"></i>
                        <span>Instagram:</span>
                        <br>
                        <i class="fab fa-twitter-square"></i>
                        <span>Twitter:</span>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Contact</h3>
                    <p>
                        <i class="fas fa-envelope"></i>
                        <span>Email:</span>
                        <br>
                        <i class="fas fa-phone"></i>
                        <span>Phone:</span>
                        <br>
                        <i class="fas fa-clock"></i>
                        <span>Opening Hours:</span>
                    </p>
                </div>
            </div>
        </div>


    </footer>
</body>

</html>