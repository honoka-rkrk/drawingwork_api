<?php

namespace App\Models;

class PeopleLimit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'people_limit',
        'event_date',
        'created_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship hasMany with EventInformation
     */
    public function EventInformations()
    {
        return $this->hasMany(EventInformation::class);
    }
}
