<?php $pageTitle = "Cinema - session" ?>
<?php $title = "Create a new session" ?>

<a href="index.php?controller=films&action=filmList" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>

<?php if (!$isAdmin) : ?>
    <h2>You don't have access to this page</h2>
<?php
    die();
endif; ?>

<form method="POST">
    <h2>Select a Film : </h2>
    <div class="d-flex">
        <?php

        foreach ($films as $film) {
        ?>

            <label class="input-group-text d-flex justify-content-center card" style="width: 18rem;">
                <h6 class="p-2 text-center"><?= $film->getFilmTitle() ?></h6>
                <img class="card-img-top" src="<?= $film->getFilmPicture() ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column justify-content-end">
                    <input type="radio" value="<?= $film->getFilmId() ?>" name="film_id" aria-label="Checkbox for following text input">
                </div>
            </label>

        <?php
        } ?>
    </div>
    <h2>Select a Room : </h2>

    <div class="d-flex">
        <?php

        foreach ($rooms as $room) {
        ?>
            <label class="input-group-text d-flex justify-content-center card" style="width: 18rem;">

                <h3 class="text-center p-2"><?= $room->getRoomNumber() ?></h3>
                <i class="fas fa-video text-center"></i>
                <div class="card-body">
                    <input type="radio" value="<?= $room->getRoomId() ?>" name="room_id" aria-label="Checkbox for following text input">
                </div>
            </label>
        <?php
        } ?>
    </div>

    <?php

    $date = new Datetime();

    $date = $date->format('d-m-y h:i');

    ?>

    <div class="col-5">
        <h3 for="date" class="form-label">Select a Date:</h3>
        <input type="datetime-local" name="session_dateTime" value="<?= $date ?>" min="<?= $date ?>" required>

    </div>

    <div class="col-12 pt-3">
        <button type="submit" name="submited" class="btn btn-primary">Create</button>
    </div>
</form>

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