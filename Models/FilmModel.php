<?php

namespace App\Models;

use App\Entities\Film;
use App\Core\DbConnect;

class FilmModel extends DbConnect
{
    private $table = 'films';

    public function createFilm(Film $film)
    {
        $this->request = $this->connection->prepare("INSERT INTO $this->table VALUES
        (NULL, :film_title, :film_description, :film_picture, :film_lengthMin, :film_rating, :film_releaseDate)");

        $this->request->bindValue(':film_title', $film->getFilmTitle());
        $this->request->bindValue(':film_description', $film->getFilmDescription());
        $this->request->bindValue(':film_picture', $film->getFilmPicture());
        $this->request->bindValue(':film_lengthMin', $film->getFilmLengthMin());
        $this->request->bindValue(':film_rating', $film->getFilmRating());
        $this->request->bindValue(':film_releaseDate', $film->getFilmReleaseDate());

        return $this->request->execute();
    }

    public function getAllFilms()
    {
        $this->request = "SELECT * FROM films";

        $result  = $this->connection->query($this->request);

        $films = $result->fetchAll();

        $list = [];
        foreach ($films as $film) {
            array_push($list, $this->createFilmObj($film));
        }

        return $list;
    }

    public function getFilmById($filmId): Film
    {
        $this->request = $this->connection->prepare("SELECT * FROM films WHERE film_id = :film_id");
        $this->request->bindValue(':film_id', $filmId);

        $this->request->execute();
        $result = $this->request->fetch();


        return $this->createFilmObj($result);
    }

    public function updateFilm(Film $film)
    {
        $this->request = $this->connection->prepare("UPDATE $this->table SET film_title = :film_title,
         film_description = :film_description, film_picture = :film_picture, film_lengthMin = :film_lengthMin,
          film_rating = :film_rating, film_releaseDate = :film_releaseDate WHERE film_id = :film_id");

        $this->request->bindValue(':film_title', $film->getFilmTitle());
        $this->request->bindValue(':film_description', $film->getFilmDescription());
        $this->request->bindValue(':film_picture', $film->getFilmPicture());
        $this->request->bindValue(':film_lengthMin', $film->getFilmLengthMin());
        $this->request->bindValue(':film_rating', $film->getFilmRating());
        $this->request->bindValue(':film_releaseDate', $film->getFilmReleaseDate());
        $this->request->bindValue(':film_id', $film->getFilmId());
        return $this->request->execute();
    }

    public function deleteFilmById($filmId)
    {
        $this->request = $this->connection->prepare("DELETE FROM $this->table WHERE film_id = :film_id");
        $this->request->bindValue(':film_id', $filmId);
        return $this->request->execute();
    }

    private function createFilmObj($resultFilm): Film
    {
        $film = new Film();

        $film->setFilmId($resultFilm->film_id);
        $film->setFilmTitle($resultFilm->film_title);
        $film->setFilmDescription($resultFilm->film_description);
        $film->setFilmPicture($resultFilm->film_picture);
        $film->setFilmLengthMin($resultFilm->film_lengthMin);
        $film->setFilmRating($resultFilm->film_rating);
        $film->setFilmReleaseDate($resultFilm->film_releaseDate);

        return $film;
    }
}
