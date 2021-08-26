<?php

namespace App\Models;

use App\Core\DbConnect;

class Sessions_users_Model extends DbConnect
{
    private $table = 'appartenir_sessions_users';

    public function reserveNewSession(int | string $user_id, int | string $session_id): bool
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table (user_id, session_id) VALUES (:user_id, :session_id)");

        $this->request->bindParam(':user_id', $user_id);
        $this->request->bindParam(':session_id', $session_id);

        return $this->request->execute();
    }

    public function getUserSessions(int | string $user_id)
    {
        $this->request = $this->connection->prepare("SELECT * FROM $this->table WHERE user_id = :user_id");

        $this->request->bindParam(':user_id', $user_id);
    }
}
