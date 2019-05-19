<?php

namespace GetCode\SW\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {

    protected $fillable = [
        'title',
        'url'
    ];

    public function people() {
        return $this->belongsToMany(People::class, 'people_film');
    }
}
