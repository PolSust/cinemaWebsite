<?php
include "components/head.php"; ?>

<body>
    </ / class="bg-darkBlue p-4">

    <h1 class="text-center text-white"><?= $title ?></h1>

    <?php if ($_SESSION["user"]->getUserId() != null) { ?>

        <nav class="d-flex justify-content-end m-2 theNav">
            <div class="dropdown">
                <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> <?= $_SESSION[
                        "user"
                    ]->getUserUsername() ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="index.php?controller=filmSessions&action=bookedSessions"><i class="fas fa-list-ul"></i> My booked Sessions</a></li>
                    <li><a class="dropdown-item" href="index.php?controller=users&action=signOut"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                </ul>
            </div>
        </nav>

    <?php } ?>

    </ / />


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
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/9.0.1/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyBKSd6PN92Fe0YqKu275HLBRIYfq1GgCfI",
            authDomain: "cinemamvc-47473.firebaseapp.com",
            projectId: "cinemamvc-47473",
            storageBucket: "cinemamvc-47473.appspot.com",
            messagingSenderId: "65915039483",
            appId: "1:65915039483:web:ec484038db71d6ab3c8a5e",
            measurementId: "G-H5VJN2ZF66"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
</body>

</html>