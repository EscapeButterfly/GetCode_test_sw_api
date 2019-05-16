<?php

namespace GetCode\SW\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model {

    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'birth_year',
        'gender_id',
        'homeworld_id',
        'created',
        'url'
    ];

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function homeworld() {
        return $this->belongsTo(HomeWorld::class);
    }

    public function films() {
        return $this->belongsToMany(Film::class, 'people_film');
    }
}
