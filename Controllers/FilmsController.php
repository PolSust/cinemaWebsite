<?php

namespace App\Controllers;

use App\Entities\Film;
use App\Models\FilmModel;

class FilmsController extends Controller
{
    public function filmList()
    {
        $filmMod = new FilmModel();

        $films = $filmMod->getAllFilms();

        $this->render('films/filmList', ['films' => $films, "isAdmin" => $_SESSION['user']->getUserIsAdmin()]);
    }

    public function filmDetails($id)
    {
        $id = intval($id);

        $filmMod = new FilmModel();
        $film = $filmMod->getFilmById($id);

        $this->render('films/filmDetails', ['film' => $film, "isAdmin" => $_SESSION['user']->getUserIsAdmin()]);
    }

    public function filmCreate()
    {
        $film = new Film();

        $error = "";
        $success = "";

        if (isset($_POST['submited'])) {

            $picture = $this->moveThePicture();

            $film = $this->createFilmObj($picture);

            $filmMod = new FilmModel();
            if ($filmMod->createFilm($film)) {
                $success = "Film added successfully!";
            } else {
                $error = "Error adding film!";
            }
        }


        $this->render('films/filmForm', ["film" => $film, "isAdmin" => $_SESSION['user']->getUserIsAdmin(), "error" => $error, "success" => $success, "mode" => "Creation"]);
    }

    public function filmUpdate($id)
    {
        $film = new Film();

        $error = "";
        $success = "";

        if (isset($_POST['submited'])) {

            if ($_FILES['picture']['name'] != "") {
                $picture = $this->moveThePicture();
                $film = $this->createFilmObj($picture);
            } else {
                $film = $this->createFilmObj($_POST["picturePath"]);
            }

            $filmMod = new FilmModel();

            if ($filmMod->updateFilm($film)) {
                $success = "Film updated successfully!";
            } else {
                $error = "Error updating film!";
            }
        } else {
            $id = intval($id);

            $filmMod = new FilmModel();
            $film = $filmMod->getFilmById($id);
        }


        $this->render('films/filmForm', ["film" => $film, "isAdmin" => $_SESSION['user']->getUserIsAdmin(), "error" => $error, "success" => $success, "mode" => "Update"]);
    }
    public function filmDelete($id)
    {
        $filmMod = new FilmModel();

        if (isset($_POST["yes"])) {
            $filmMod->deleteFilmById($_POST["filmId"]);
            header("Location: index.php?controller=films&action=filmList");
        } else if (isset($_POST["no"])) {
            header("Location: index.php?controller=films&action=filmList");
        } else {

            $film = $filmMod->getFilmById(intval($id));
        }


        $this->render('films/filmDeleteForm', ['film' => $film, "isAdmin" => $_SESSION['user']->getUserIsAdmin()]);
    }

    private function createFilmObj($picture): Film
    {
        $film = new Film();
        $film->setFilmId(intval($_POST["filmId"]));
        $film->setFilmTitle(trim($_POST['title']));
        $film->setFilmDescription(trim($_POST['description']));
        $film->setFilmLengthMin(trim($_POST['length']));
        $film->setFilmReleaseDate(trim($_POST['releaseDate']));
        $film->setFilmRating(trim($_POST['rating']));
        $film->setFilmPicture($picture);

        return $film;
    }

    private function moveThePicture(): string
    {
        move_uploaded_file($_FILES['picture']['tmp_name'], "images/" . $_FILES['picture']['name']);
        return "images/" . $_FILES['picture']['name'];
    }
}
