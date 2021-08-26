<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\Room;

class RoomModel extends DbConnect
{
    private $table = 'rooms';

    public function createRoom(Room $room)
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table VALUES (NULL, :room_number)");
        $this->request->bindValue(':room_number', $room->getRoomNumber());

        return $this->request->execute();
    }

    public function getAllRooms()
    {
        $this->request = "SELECT * FROM $this->table";

        $result  = $this->connection->query($this->request);

        $rooms = $result->fetchAll();

        $list = [];
        foreach ($rooms as $room) {
            array_push($list, $this->createRoomObj($room));
        }

        return $list;
    }

    public function updateRoom(Room $room)
    {
        $this->request = $this->connection->prepare("UPDATE $this->table SET room_number = :room_number WHERE room_id = :room_id");

        $this->request->bindValue(':room_number', $room->getRoomNumber());
        $this->request->bindValue(':room_id', $room->getRoomId());
        return $this->request->execute();
    }

    public function deleteRoomById(int $roomId)
    {
        $this->request = $this->connection->prepare("DELETE FROM $this->table WHERE room_id = :room_id");
        $this->request->bindValue(':room_id', $roomId);
        return $this->request->execute();
    }

    private function createRoomObj($resultRoom): Room
    {
        $room = new Room();

        $room->setRoomId($resultRoom->room_id);
        $room->setRoomNumber($resultRoom->room_number);

        return $room;
    }
}
