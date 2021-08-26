<?php

namespace App\Entities;

use DateTime;

class Film_session
{
    private $session_id;
    private $session_dateTime;
    private $room_id;
    private $film_id;

    /**
     * Get the value of session_id
     *
     * @return  int
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Get the value of session_dateTime
     *
     * @return  string
     */
    public function getSessionDateTime()
    {
        return $this->session_dateTime;
    }

    /**
     * Set the value of session_dateTime
     *
     * @param  DateTime  $session_dateTime
     *
     * @return  self
     */
    public function setSessionDateTime($session_dateTime)
    {
        $this->session_dateTime = $session_dateTime;

        return $this;
    }

    /**
     * Get the value of room_id
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * Set the value of room_id
     *
     * @return  self
     */
    public function setRoomId($room_id)
    {
        $this->room_id = $room_id;

        return $this;
    }

    /**
     * Get the value of film_id
     */
    public function getFilmId()
    {
        return $this->film_id;
    }

    /**
     * Set the value of film_id
     *
     * @return  self
     */
    public function setFilmId($film_id)
    {
        $this->film_id = $film_id;

        return $this;
    }
}
