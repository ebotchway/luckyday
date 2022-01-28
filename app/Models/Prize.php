<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pname',
        'description',
    ];

    public function score()
    {
        // Accessing scores with their details to prizes

        return $this->hasMany(Playerscore::class);
    }
}
