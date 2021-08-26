<?php

namespace App\Controllers;

use App\Entities\Film_session;
use App\Models\Film_sessionModel;
use App\Models\FilmModel;
use App\Models\RoomModel;
use DateTime;

class FilmSessionsController extends Controller
{
    public function sessionCreate()
    {
        $success = "";
        $error = "";

        if (isset($_POST["submited"])) {
            var_dump($_POST);

            $session = $this->createSessionObject();

            $sessionMod = new Film_sessionModel();
            if ($sessionMod->createFilmSession($session)) {
                $success = "Film session added successfully!";
            } else {
                $error = "Error adding film session!";
            }
        }

        $filmMod = new FilmModel();
        $films = $filmMod->getAllFilms();

        $roomMod = new RoomModel();
        $rooms = $roomMod->getAllRooms();

        $this->render('sessions/sessionCreate', ["success" => $success, "error" => $error, 'films' => $films, "isAdmin" => $_SESSION['user'] !== null ? $_SESSION['user']->getUserIsAdmin() : false, "rooms" => $rooms]);
    }

    private function createSessionObject()
    {
        $session = new Film_session();
        $session->setSessionDateTime($_POST["session_dateTime"]);
        $session->setFilmId($_POST['film_id']);
        $session->setRoomId($_POST['room_id']);
        return $session;
    }
}
