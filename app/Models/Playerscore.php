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
        'pid',
        '#1_win',
        '#2_win',
        '#3_win',
        '#1_question',
        '#2_question',
        '#3_question',
    ];

    public function gameing()
    {
        // Accessing players with their details to scores

        return $this->belongsTo(Player::class, 'pid');
    }

    public function stagequest()
    {
        // Accessing questions with their details to scores

        return $this->belongsTo(Question::class, '#1_question', '#2_question', '#3_question');
    }

    public function stageprize()
    {
        // Accessing prizes with their details to scores

        return $this->belongsTo(Prize::class, '#1_win', '#2_win', '#3_win');
    }
}
