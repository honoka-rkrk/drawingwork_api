<?php

namespace App\Models;

class Theme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_information_id',
        'theme',
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
     * Relationship belongsTo with EventInformation
     */
    public function EventInformation()
    {
        return $this->belongsTo(EventInformation::class);
    }
}
