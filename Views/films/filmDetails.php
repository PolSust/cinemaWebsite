<?php $pageTitle = "Cinema - liste" ?>
<?php $title = $film->getFilmTitle() ?>

<a href="index.php?controller=films&action=filmList" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>

<div class="container d-flex">

    <div class="col-6"><img class="col-12" src="<?= $film->getFilmPicture() ?>" alt="">
        <p class="text-warning m-4"><i class="fas fa-star m-2"></i><?= $film->getFilmRating() ?></p>
        <p class="text-secondary m-4"><i class="fas fa-clock"></i> <?= $film->getFilmLengthMin() ?> min.</p>
        <p class="m-4">
            <?= $film->getFilmDescription() ?>
        </p>
    </div>

    <div class="col-6 m-4">

        <form method="POST">
            <?php
            foreach ($sessionDates as $key => $sessions) {
            ?>
                <div class="col-12 mt-4">
                    <h5><?= $key ?></h5>
                    <ul class="list-group col-6">
                        <?php
                        foreach ($sessions as $session) {
                            $sessionDate = $session->getSessionDateTime();
                            explode(" ", $sessionDate);
                            $time = explode(" ", $sessionDate)[1];
                            $time = substr($time, 0, 5);

                            //disable button if session is already booked
                            $disabled = "";
                            $booked = "";
                            foreach ($userReservedSessions as $userReservedSession) {
                                if ($userReservedSession->session_id == $session->getSessionId()) {
                                    $disabled = "disabled";
                                    $booked = "- Alredy booked";
                                    break;
                                }
                            }
                        ?>
                            <label>
                                <li class="list-group-item col-12 d-flex justify-content-between align-items-center"><?= $time ?> <?= $booked ?><input type="radio" name="session_id" value="<?= $session->getSessionId() ?>" <?= $disabled ?>></li>
                            </label>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            <?php
            }
            ?>

            <?php
            if (empty($sessionDates)) {
            ?>
                <div class="card">
                    <h4 class="p-5 text-center">No sessions availabe for this film</h4>
                </div>

            <?php
            } else {
            ?>
                <button class="btn btn-primary mt-4" type="submit" name="submited">Buy</button>
            <?php
            }
            ?>
        </form>


    </div>
</div>

<div class="d-flex justify-content-center">
    <?php
    if ($error != "") {
    ?>
        <div class="alert alert-danger text-center col-5" role="alert">
            <?= $error ?>
        </div>
    <?php
    }
    ?>

    <?php
    if ($success != "") {
    ?>
        <div class="alert alert-success text-center col-5" role="alert">
            <?= $success ?>
        </div>
    <?php
    }
    ?>
</div>