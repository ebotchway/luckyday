<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pname',
        'phone_num',
        'location',
    ];

    public function winning()
    {
        // Accessing scores with their details to players

        return $this->hasOne(Playerscore::class);
    }

    public function gaming()
    {
        // Accessing game with their details to players

        return $this->hasOne(Playerscore::class);
    }
}
