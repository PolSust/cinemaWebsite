<?php $pageTitle = "Cinema - liste" ?>
<?php $title = "Les films en carte" ?>

<?php if ($isAdmin) : ?>
    <a href="index.php?controller=films&action=filmCreate" class="btn btn-primary">
        <p class="text-center">Add a new film <i class="far fa-plus-square"></i></p>
    </a>
<?php endif; ?>


<div class="container-fluid d-flex flex-wrap justify-content-center">
    <?php
    foreach ($films as $film) {

        $shortDescription = substr($film->film_description, 0, 100)
    ?>
        <div class="card" style="width: 18rem;">
            <div class="position-relative">
                <img src="<?= $film->film_picture ?>" class="card-img-top" alt="<?= $film->film_title ?>">

                <?php
                if ($isAdmin) {
                ?>
                    <div class="dropdown btn btn-primary position-absolute top-0 end-0">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <form action="index.php?controller=films&action=filmUpdate" method="POST">
                                <li class="p-1"><button type="submit" class="btn btn-primary" name="id" value="<?= $film->film_id ?>"><i class="fas fa-pencil-alt"></i></button></li>
                            </form>
                            <form action="index.php?controller=films&action=filmDelete" method="POST">
                                <li class="p-1"><button type="submit" class="btn btn-danger" name="id" value="<?= $film->film_id ?>"><i class="fas fa-trash"></i></button></li>
                            </form>
                        </ul>
                    </div>


                <?php
                }
                ?>



                <form action="index.php?controller=films&action=filmDetails" method="POST">
                    <button type="submit" name="id" value="<?= $film->film_id ?>" class="btn btn-primary position-absolute bottom-0 end-0">Reserver <i class="fas fa-ticket-alt"></i></button>
                </form>
            </div>
            <div class="card-body row">

                <div class="col-8">
                    <h5 class="card-title"><?= $film->film_title ?></h5>
                    <p class="card-text"><?= $shortDescription ?>...</p>
                </div>

                <div class="col-4 text-warning"><i class="fas fa-star m-2"></i><?= $film->film_rating ?></div>
            </div>
        </div>

    <?php
    }
    ?>
</div>