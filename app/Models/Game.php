<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pid',
    ];

    public function person()
    {
        // Accessing players with their details to games

        return $this->belongsTo(Player::class, 'pid');
    }
}