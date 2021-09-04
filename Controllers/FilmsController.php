<?php

namespace App\Controllers;

use App\Entities\Film;
use App\Models\Film_sessionModel;
use App\Models\FilmModel;
use App\Models\Sessions_users_Model;

class FilmsController extends Controller
{
    public function filmList()
    {
        $filmMod = new FilmModel();

        $films = $filmMod->getAllFilms();

        // if (!isset($_SESSION['user']))  return;
        $this->render("films/filmList", [
            "films" => $films,
            "isAdmin" =>
                $_SESSION["user"] !== null
                    ? $_SESSION["user"]->getUserIsAdmin()
                    : false,
        ]);
    }

    public function filmDetails($id)
    {
        $success = "";
        $error = "";
        $film = new Film();

        $sortedSessions = [];

        if (isset($_POST["submited"])) {
            $sessionsUsersMod = new Sessions_users_Model();

            $added = $sessionsUsersMod->addNewSessionReservation(
                $_SESSION["user"]->getUserId(),
                $_POST["session_id"]
            );

            if ($added) {
                header("Location: index.php?controller=films&action=filmList");
            } else {
                $error = "You alredy have a ticket for this session";
            }
        } else {
            $sessionsUsersMod = new Sessions_users_Model();

            $userReservedSessions = $sessionsUsersMod->getUserSessions(
                $_SESSION["user"]->getUserId()
            );

            $filmMod = new FilmModel();
            $film = $filmMod->getFilmById($id);

            $sessionsMod = new Film_sessionModel();
            $sessions = $sessionsMod->getAllSessionsByFilmId($id);

            foreach ($sessions as $session) {
                $date = $session->getSessionDateTime();

                $date = explode(" ", $date);
                $date = $date[0];

                if (!in_array($date, $sortedSessions)) {
                    $sortedSessions[$date] = [];
                }
            }

            foreach ($sessions as $session) {
                $date = $session->getSessionDateTime();

                $date = explode(" ", $date);
                $date = $date[0];

                if (isset($sortedSessions[$date])) {
                    array_push($sortedSessions[$date], $session);
                }
            }
        }

        $this->render("films/filmDetails", [
            "userReservedSessions" => $userReservedSessions,
            "error" => $error,
            "success" => $success,
            "sessionDates" => $sortedSessions,
            "film" => $film,
            "isAdmin" =>
                $_SESSION["user"] !== null
                    ? $_SESSION["user"]->getUserIsAdmin()
                    : false,
        ]);
    }

    public function filmCreate()
    {
        $film = new Film();

        $error = "";
        $success = "";

        if (isset($_POST["submited"])) {
            $picture = $this->moveThePicture();

            $film = $this->createFilmObj($picture);

            $filmMod = new FilmModel();
            if ($filmMod->createFilm($film)) {
                $success = "Film added successfully!";
            } else {
                $error = "Error adding film!";
            }
        }

        $this->render("films/filmForm", [
            "film" => $film,
            "isAdmin" =>
                $_SESSION["user"] !== null
                    ? $_SESSION["user"]->getUserIsAdmin()
                    : false,
            "error" => $error,
            "success" => $success,
            "mode" => "Creation",
        ]);
    }

    public function filmUpdate($id)
    {
        $film = new Film();

        $error = "";
        $success = "";

        if (isset($_POST["submited"])) {
            if ($_FILES["picture"]["name"] != "") {
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

        $this->render("films/filmForm", [
            "film" => $film,
            "isAdmin" =>
                $_SESSION["user"] !== null
                    ? $_SESSION["user"]->getUserIsAdmin()
                    : false,
            "error" => $error,
            "success" => $success,
            "mode" => "Update",
        ]);
    }
    public function filmDelete($id)
    {
        $filmMod = new FilmModel();

        if (isset($_POST["yes"])) {
            $filmMod->deleteFilmById($_POST["filmId"]);
            header("Location: index.php?controller=films&action=filmList");
        } elseif (isset($_POST["no"])) {
            header("Location: index.php?controller=films&action=filmList");
        } else {
            $film = $filmMod->getFilmById(intval($id));
        }

        $this->render("films/filmDeleteForm", [
            "film" => $film,
            "isAdmin" =>
                $_SESSION["user"] !== null
                    ? $_SESSION["user"]->getUserIsAdmin()
                    : false,
        ]);
    }

    private function createFilmObj($picture): Film
    {
        $film = new Film();
        $film->setFilmId(intval($_POST["filmId"]));
        $film->setFilmTitle(trim($_POST["title"]));
        $film->setFilmDescription(trim($_POST["description"]));
        $film->setFilmLengthMin(trim($_POST["length"]));
        $film->setFilmReleaseDate(trim($_POST["releaseDate"]));
        $film->setFilmRating(trim($_POST["rating"]));
        $film->setFilmPicture($picture);

        return $film;
    }

    private function moveThePicture(): string
    {
        move_uploaded_file(
            $_FILES["picture"]["tmp_name"],
            "images/" . $_FILES["picture"]["name"]
        );
        return "images/" . $_FILES["picture"]["name"];
    }
}
