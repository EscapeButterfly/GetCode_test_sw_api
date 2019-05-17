<?php

namespace GetCode\SW\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class People extends Model {

    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'birth_year',
        'gender',
        'homeworld_id',
        'created',
        'url'
    ];

    public function setBirthYearAttribute($value) {
        $this->attributes['birth_year'] = strtoupper($value);
    }

    public function getCreatedAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeSearch($query, $value) {
        return $query->where(function ($query) use ($value) {
            $query->orWhere('name', 'LIKE', "%{$value}%");
            $query->orWhere('gender', 'LIKE', "%{$value}%");
            $query->orWhereHas('homeworld', function ($query) use ($value) {
                $query->where('name', 'LIKE', "{$value}");
            });
            $query->orWhereHas('films', function ($query) use ($value) {
                $query->where('title', 'LIKE', "{$value}");
            });
            return $query;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function homeworld() {
        return $this->belongsTo(HomeWorld::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function films() {
        return $this->belongsToMany(Film::class, 'people_film');
    }
}
