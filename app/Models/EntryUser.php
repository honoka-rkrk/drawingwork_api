<?php

namespace App\Models;

class EntryUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'event_information_id',
        'illust_url',
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
     * Relationship belongsTo with User
     */
    public function user()
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Relationship belongsTo with EventInformation
     */
    public function eventInformation()
    {
        return $this->belongsTo(EventInformation::class);
    }
}
