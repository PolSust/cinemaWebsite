<?php $pageTitle = "Cinema - " . $mode ?>
<?php $title = $mode . " d'un film" ?>

<a href="index.php?controller=films&action=filmList" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>

<?php if (!$isAdmin) : ?>
    <h2>You don't have access to this page</h2>
<?php
    die();
endif; ?>

<form class="row g-3" method="POST" enctype="multipart/form-data">
    <!-- hidden input for id on the update -->
    <input type="text" name="filmId" value="<?= $film->getFilmId() ?>" hidden>
    <div class="col-md-6">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $film->getFilmTitle() ?>" id="title" required>

        <div class="col-4">
            <label for="duration" class="form-label">Duration (Minutes)</label>
            <input type="number" name="length" class="form-control" id="duration" value="<?= $film->getFilmLengthMin() ?>" placeholder="Minutes" required>
        </div>
        <div class="col-4">
            <label for="rating" class="form-label">Rating <i class="fas fa-star m-2"></i></label>
            <input type="number" name="rating" class="form-control" id="rating" value="<?= $film->getFilmRating() ?>" placeholder="1-10" required>
        </div>
        <div class="col-10">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" name="picture" class="form-control" id="picture" <?php if ($mode == "Creation")  echo "required";  ?>>
            <!-- hidden image path -->
            <input type="text" name="picturePath" value="<?= $film->getFilmPicture() ?>" hidden>
            <div>
                <img class="col-3" src="<?= $film->getFilmPicture() ?>" alt="">
            </div>
        </div>
        <div class="col-5">
            <label for="date" class="form-label">Release date</label>
            <input type="date" name="releaseDate" class="form-control" id="date" value="<?= $film->getFilmReleaseDate() ?>" required>
        </div>
    </div>
    <div class=" col-md-6">
        <label for="inputPassword4" class="form-label">Description</label>
        <textarea class="form-control" id="inputPassword4" name="description" rows="10" required><?= $film->getFilmDescription() ?></textarea>
    </div>

    <div class="col-12">
        <button type="submit" name="submited" class="btn btn-primary"><?= $mode ?></button>
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