<?php

namespace App\Entities;

class Film
{
    private  $film_id;
    private  $film_title;
    private  $film_description;
    private  $film_picture;
    private  $film_lengthMin;
    private  $film_rating;
    private $film_releaseDate;

    /**
     * Get the value of film_id
     *
     * @return  int
     */
    public function getFilmId()
    {
        return $this->film_id;
    }

    /**
     * Get the value of film_title
     *
     * @return  string
     */
    public function getFilmTitle()
    {
        return $this->film_title;
    }

    /**
     * Set the value of film_title
     *
     * @param  string  $film_title
     *
     * @return  self
     */
    public function setFilmTitle(string $film_title)
    {
        $this->film_title = $film_title;

        return $this;
    }

    /**
     * Get the value of film_description
     *
     * @return  string
     */
    public function getFilmDescription()
    {
        return $this->film_description;
    }

    /**
     * Set the value of film_description
     *
     * @param  string  $film_description
     *
     * @return  self
     */
    public function setFilmDescription(string $film_description)
    {
        $this->film_description = $film_description;

        return $this;
    }

    /**
     * Get the value of film_picture
     *
     * @return  string
     */
    public function getFilmPicture()
    {
        return $this->film_picture;
    }

    /**
     * Set the value of film_picture
     *
     * @param  string  $film_picture
     *
     * @return  self
     */
    public function setFilmPicture(string $film_picture)
    {
        $this->film_picture = $film_picture;

        return $this;
    }

    /**
     * Get the value of film_lengthMin
     *
     * @return  int
     */
    public function getFilmLengthMin()
    {
        return $this->film_lengthMin;
    }

    /**
     * Set the value of film_lengthMin
     *
     * @param  int  $film_lengthMin
     *
     * @return  self
     */
    public function setFilmLengthMin(int $film_lengthMin)
    {
        $this->film_lengthMin = $film_lengthMin;

        return $this;
    }

    /**
     * Get the value of film_rating
     *
     * @return  float
     */
    public function getFilmRating()
    {
        return $this->film_rating;
    }

    /**
     * Set the value of film_rating
     *
     * @param  float  $film_rating
     *
     * @return  self
     */
    public function setFilmRating(float $film_rating)
    {
        $this->film_rating = $film_rating;

        return $this;
    }

    /**
     * Get the value of film_releaseDate
     */
    public function getFilmReleaseDate()
    {
        return $this->film_releaseDate;
    }

    /**
     * Set the value of film_releaseDate
     *
     * @return  self
     */
    public function setFilmReleaseDate($film_releaseDate)
    {
        $this->film_releaseDate = $film_releaseDate;

        return $this;
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
