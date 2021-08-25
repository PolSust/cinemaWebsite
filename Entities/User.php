<?php

namespace App\Entities;

class User
{
    private $user_id;
    private $user_isAdmin;
    private $user_username;
    private $user_email;
    private $user_password;

    /**
     * Get the value of user_id
     *
     * @return  int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the value of user_isAdmin
     *
     * @return  bool
     */
    public function getUserIsAdmin()
    {
        return $this->user_isAdmin;
    }

    /**
     * Set the value of user_isAdmin
     *
     * @param  bool  $user_isAdmin
     *
     * @return  self
     */
    public function setUserIsAdmin(bool $user_isAdmin)
    {
        $this->user_isAdmin = $user_isAdmin;

        return $this;
    }

    /**
     * Get the value of user_email
     *
     * @return  string
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     *
     * @param  string  $user_email
     *
     * @return  self
     */
    public function setUserEmail(string $user_email)
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_password
     *
     * @return  string
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_password
     *
     * @param  string  $user_password
     *
     * @return  self
     */
    public function setUserPassword(string $user_password)
    {
        $this->user_password = $user_password;

        return $this;
    }

    /**
     * Get the value of user_username
     *
     * @return  string
     */
    public function getUserUsername()
    {
        return $this->user_username;
    }

    /**
     * Set the value of user_username
     *
     * @param  string  $user_username
     *
     * @return  self
     */
    public function setUserUsername(string $user_username)
    {
        $this->user_username = $user_username;

        return $this;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
