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
        'pname',
    ];

    public function winning()
    {
        // Accessing scores with their details to players

        return $this->hasOne(Playerscore::class);
    }
}
