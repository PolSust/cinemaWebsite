<?php

namespace App\Entities;

use DateTime;

class Film_session
{
    private int $session_id;
    private DateTime $session_dateTime;

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
     * @return  DateTime
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
    public function setSessionDateTime(DateTime $session_dateTime)
    {
        $this->session_dateTime = $session_dateTime;

        return $this;
    }
}
