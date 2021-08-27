<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\Film_session;
use PDOException;

class Sessions_users_Model extends DbConnect
{
    private $table = 'appartenir_users_sessions';

    public function addNewSessionReservation($user_id, $session_id): bool
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table (user_id, session_id) VALUES (:user_id, :session_id)");

        $this->request->bindParam(':user_id', $user_id);
        $this->request->bindParam(':session_id', $session_id);

        try {
            return $this->request->execute();
        } catch (PDOException $error) {
            return false;
        }
    }

    public function getUserSessions($user_id)
    {
        $this->request = $this->connection->prepare("SELECT * FROM $this->table WHERE user_id = :user_id");

        $this->request->bindParam(':user_id', $user_id);

        $this->request->execute();

        $results = $this->request->fetchAll();

        $list = [];
        foreach ($results as $result) {
            array_push($list, $this->createSessionObject($result));
        }
        return $list;
    }

    private function createSessionObject($resultSession)
    {
        $session = new Film_session();

        $session->setSessionId($resultSession->session_id);
        $session->setSessionDateTime($resultSession->session_dateTime);
        $session->setRoomId($resultSession->room_id);
        $session->setFilmId($resultSession->film_id);
    }
}
