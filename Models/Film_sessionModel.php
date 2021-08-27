<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\Film_session;

class Film_sessionModel extends DbConnect
{
    private $table = 'film_sessions';

    public function createFilmSession(Film_session $session): bool
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table VALUES (NULL, :session_dateTime, :room_id, :film_id)");
        $this->request->bindValue(':session_dateTime', $session->getSessionDateTime());
        $this->request->bindValue(':room_id', $session->getRoomId());
        $this->request->bindValue(':film_id', $session->getFilmId());

        return $this->request->execute();
    }

    public function getAllFilmSessions()
    {
        $this->request = "SELECT * FROM $this->table";

        $result  = $this->connection->query($this->request);

        $list = $result->fetchAll();

        $sessions = [];

        foreach ($list as $session) {
            array_push($sessions, $this->createSessionObject($session));
        }

        return $sessions;
    }

    public function getAllSessionsByFilmId($film_id)
    {
        $this->request = "SELECT * FROM $this->table WHERE film_id=" . $film_id;

        $result = $this->connection->query($this->request);

        $list = $result->fetchAll();

        $sessions = [];

        foreach ($list as $session) {
            array_push($sessions, $this->createSessionObject($session));
        }

        return $sessions;
    }
    public function getAllSessionsByUserId($user_id)
    {
        $this->request = $this->connection->prepare(
            "SELECT film_sessions.session_dateTime , rooms.*, films.* FROM film_sessions 
            INNER JOIN rooms ON rooms.room_id = film_sessions.room_id 
            INNER JOIN films ON films.film_id = film_sessions.film_id
            INNER JOIN appartenir_users_sessions ON appartenir_users_sessions.session_id = film_sessions.session_id AND appartenir_users_sessions.user_id = :user_id"
        );

        $this->request->bindValue(':user_id', $user_id);

        $this->request->execute();

        $list = $this->request->fetchAll();

        return $list;
    }

    public function updateSession(Film_session $session)
    {
        $this->request = $this->connection->prepare("UPDATE $this->table SET session_dateTime = :session_dateTime WHERE session_id = :session_id");
        $this->request->bindValue(':session_dateTime', $session->getSessionDateTime());
        $this->request->bindValue(':session_id', $session->getSessionId());
        return $this->request->execute();
    }

    public function deleteFilmSessionById(int $id)
    {
        $this->request = $this->connection->prepare("DELETE FROM $this->table WHERE session_id = :session_id");
        $this->request->bindValue(':session_id', $id);
        return $this->request->execute();
    }

    private function createSessionObject($resultSession): Film_session
    {
        $session = new Film_session();

        $session->setSessionId($resultSession->session_id);
        $session->setSessionDateTime($resultSession->session_dateTime);
        $session->setFilmId($resultSession->film_id);
        $session->setRoomId($resultSession->room_id);

        return $session;
    }
}
