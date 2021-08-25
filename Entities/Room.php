<?php

namespace App\Entities;

class Room
{
    public int $room_id;
    public int $room_number;

    /**
     * Get the value of room_id
     *
     * @return  int
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * Get the value of room_number
     *
     * @return  int
     */
    public function getRoomNumber()
    {
        return $this->room_number;
    }

    /**
     * Set the value of room_number
     *
     * @param  int  $room_number
     *
     * @return  self
     */
    public function setRoomNumber(int $room_number)
    {
        $this->room_number = $room_number;

        return $this;
    }
}
