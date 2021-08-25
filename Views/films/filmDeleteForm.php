<?php $pageTitle = "Cinema - film" ?>
<?php $title = "Delete " . $film->getFilmTitle() . "?" ?>


<?php if (!$isAdmin) : ?>
    <h2>You don't have access to this page</h2>
<?php
    die();
endif; ?>

<div class="alert alert-danger d-flex justify-content-center flex-wrap" role="alert">
    <h3 class="w-100 text-center">Voulez-vous vraiment supprimer "<strong><?= $film->getFilmTitle() ?></strong>" ?</h3>
    <div class="d-flex justify-content-center m-3">
        <img class="col-3" src="<?= $film->getFilmPicture() ?>" alt="">
    </div>
    <form method="POST">
        <input type="text" name="filmId" value="<?= $film->getFilmId() ?>" hidden>
        <button name="yes" type="submit" class="btn btn-danger">Oui, je veux supprimer ce film</button>
        <button name="no" class="btn btn-secondary">Non, je ne veux pas</button>
    </form>
</div>