<?php

namespace App\Models;

class EventInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'people_limit',
        'entry_number_of_people',
        'event_date',
        'created_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'event_date',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship hasOne with Theme
     */
    public function theme()
    {
        return $this->hasOne(Theme::class);
    }

    /**
     * Relationship belongsTo with PeopleLimit
     */
    public function peopleLimit()
    {
        return $this->belongsTo(PeopleLimit::class);
    }

    /**
     * Relationship hasMany with EntryUser
     */
    public function entryUser()
    {
        return $this->hasMany(EntryUser::class);
    }
}
