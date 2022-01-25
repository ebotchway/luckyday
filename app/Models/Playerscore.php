<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playerscore extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first',
        'second',
        'third',
        'fourth',
    ];

    public function person()
    {
        // Accessing players with their details to scores

        return $this->belongsTo(Player::class, 'pid');
    }
}
