<?php
include "components/head.php"
?>

<body>
    <?php

    if ($_SESSION["user"]->getUserId() != null) {
    ?>

        <nav class="d-flex justify-content-end m-2">
            <div class="dropdown">
                <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION["user"]->getUserUsername() ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="index.php?controller=filmSessions&action=bookedSessions">My booked Sessions </a></li>
                    <li><a class="dropdown-item" href="index.php?controller=users&action=signOut">Sign Out <i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        </nav>

    <?php
    }

    ?>
    <div class="container">

        <header>
            <h1 class="text-center"><?= $title ?></h1>

        </header>

        <main><?= $content ?></main>

    </div>
</body>

</html>