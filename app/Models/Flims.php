<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flims extends Model
{
    protected $table = 'flims';
    protected $fillable = [
        'title', 'description', 'year', 'director', 'cast', 'country', 'duration',
        'rating', 'image', 'status', 'language', 'trailer', 'video', 'genres_id'
    ];

    public function getTitle($title)
    {
        return $title;
    }
    public function setTitle($title)
    {
        $this->attributes['title'] = ($title);
    }


    public function getDescription($description)
    {
        return $description;
    }
    public function setDescription($description)
    {
        $this->attributes['description'] = ($description);
    }



    public function getYear($year)
    {
        return $year;
    }
    public function setYear($year)
    {
        $this->attributes['year'] = ($year);
    }


    public function getDirector($director)
    {
        return $director;
    }
    public function setDirector($director)
    {
        $this->attributes['director'] = ($director);
    }


    public function getCast($cast)
    {
        return $cast;
    }
    public function setCast($cast)
    {
        $this->attributes['cast'] = ($cast);
    }


    public function getCountry($country)
    {
        return $country;
    }
    public function setCountry($country)
    {
        $this->attributes['country'] = ($country);
    }


    public function getDuration($duration)
    {
        return $duration;
    }
    public function setDuration($duration)
    {
        $this->attributes['duration'] = ($duration);
    }


    public function getRating($rating)
    {
        return $rating;
    }
    public function setRating($rating)
    {
        $this->attributes['rating'] = ($rating);
    }


    public function getImage($image)
    {
        return $image;
    }
    public function setImage($image)
    {
        $this->attributes['image'] = ($image);
    }


    public function getStatus($status)
    {
        return $status;
    }
    public function setStatus($status)
    {
        $this->attributes['status'] = ($status);
    }


    public function getLanguage($language)
    {
        return $language;
    }
    public function setLanguage($language)
    {
        $this->attributes['language'] = ($language);
    }


    public function getTrailer($trailer)
    {
        return $trailer;
    }
    public function setTrailer($trailer)
    {
        $this->attributes['trailer'] = ($trailer);
    }


    public function getVideo($video)
    {
        return $video;
    }
    public function setVideo($video)
    {
        $this->attributes['video'] = ($video);
    }


    public function getGenres_id($genres_id)
    {
        return $genres_id;
    }
    public function setGenres_id($genres_id)
    {
        $this->attributes['genres_id'] = ($genres_id);
    }
}
