<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\Film_session;

class Film_sessionModel extends DbConnect
{
    private $table = 'film_sessions';

    public function createFilmSession(Film_session $session)
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table VALUES (NULL, :session_dateTime)");
        $this->request->bindValue(':session_dateTime', $session->getSessionDateTime());

        return $this->request->execute();
    }

    public function getAllFilmSessions()
    {
        $this->request = "SELECT * FROM $this->table";

        $result  = $this->connection->query($this->request);

        $list = $result->fetchAll();
        return $list;
    }

    public function updateSession(Film_session $session){
        $this->request = $this->connection->prepare("UPDATE $this->table SET session_dateTime = :session_dateTime WHERE session_id = :session_id");
        $this->request->bindValue(':session_dateTime', $session->getSessionDateTime());
        $this->request->bindValue(':session_id', $session->getSessionId());
        return $this->request->execute();
    }

    public function deleteFilmSessionById(int $id){
        $this->request = $this->connection->prepare("DELETE FROM $this->table WHERE session_id = :session_id");
        $this->request->bindValue(':session_id', $id);
        return $this->request->execute();
    }
}
