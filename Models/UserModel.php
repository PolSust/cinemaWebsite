<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\User;

class UserModel extends DbConnect
{
    private $table = "users";

    public function createUser(User $user)
    {
        $this->request = $this->connection->prepare(
            "INSERT INTO $this->table VALUES (NULL, :user_isAdmin, :user_username, :user_email, :user_password)"
        );

        $this->request->bindValue(":user_isAdmin", 1);
        $this->request->bindValue(":user_username", $user->getUserUsername());
        $this->request->bindValue(":user_email", $user->getUserEmail());
        $this->request->bindValue(":user_password", $user->getUserPassword());
        return $this->request->execute();
    }

    public function getUserByEmail(string $email)
    {
        $this->request = $this->connection->prepare(
            "SELECT * FROM $this->table WHERE user_email = :user_email"
        );
        $this->request->bindParam(":user_email", $email);
        $this->request->execute();
        return $this->request->fetch();
    }

    public function updateUser(User $user)
    {
        $this->request = $this->connection->prepare(
            "UPDATE $this->table VALUES (NULL, :user_isAdmin, :user_username, :user_email, :user_password)"
        );

        $this->request->bindParam(":user_isAdmin", $user->getUserIsAdmin());
        $this->request->bindParam(":user_username", $user->getUserUsername());
        $this->request->bindParam(":user_email", $user->getUserEmail());
        $this->request->bindParam(":user_password", $user->getUserPassword());
        return $this->request->execute();
    }

    public function deleteUser(User $user)
    {
        $this->request = $this->connection->prepare(
            "DELETE FROM $this->table WHERE user_email = :user_email"
        );

        $this->request->bindParam(":user_email", $user->getUserEmail());
        return $this->request->execute();
    }
}
