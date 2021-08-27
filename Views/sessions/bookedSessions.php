<?php $pageTitle = "Cinema - Sessions" ?>
<?php $title = "My Booked Sessions" ?>

<a href="index.php?controller=films&action=filmList" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>

<div class="container col-10 d-flex flex-wrap">
    <?php
    // var_dump($sessions);
    foreach ($sessions as $session) {
    ?>
        <div class="card p-2 m-2 text-black col-5">
            <div class="card-body d-flex">
                <div class="col-10">
                    <p><b><?= $session->film_title ?></b></p>
                    <p>At <?= substr($session->session_dateTime, 5, 11) ?></p>
                    <p><b>Room nº<?= $session->room_number ?></b></p>
                </div>
                <div class="col-2">
                    <img class="col-12" x src="<?= $session->film_picture ?>" alt="<?= $session->film_title ?> cover picture">
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>