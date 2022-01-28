<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
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
        // Accessing scores with their details to questions

        return $this->hasMany(Playerscore::class);
    }
}
