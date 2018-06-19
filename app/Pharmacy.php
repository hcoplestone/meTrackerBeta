<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'telephone', 'address'];

    /**
     * Gets the users associated with the pharmacy (pharmacists and patients)
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
