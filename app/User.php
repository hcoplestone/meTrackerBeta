<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pharmacy_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the pharmacy that the user belongs to (if pharmacist or patient)
     */
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }

    /**
     * Gets the diary entries associated with a user (patients)
     */
    public function diary_entries()
    {
        return $this->hasMany('App\DiaryEntry');
    }
}
