<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'stage' => '1',
            'question' => 'Who won the afcon 2022?',
            'answer' => 'Mickel L Johnson'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'What is smart?',
            'answer' => 'Dance move'
        ]);

        Question::create([
            'stage' => '1',
            'question' => 'Define anger',
            'answer' => 'Make a move'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'So who is the champion of the world',
            'answer' => 'Slim Buster'
        ]);

        Question::create([
            'stage' => '1',
            'question' => 'Whp won independece for Ghana?',
            'answer' => 'Adwoa Smart'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'How do you see Ghana soon?',
            'answer' => 'Russia will come for us'
        ]);

        Question::create([
            'stage' => '1',
            'question' => 'What is your best advice to the youth',
            'answer' => 'Leave the country'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'Can businesses survive in Ghana',
            'answer' => 'Yes, through corruption'
        ]);

        Question::create([
            'stage' => '1',
            'question' => 'Are you happy?',
            'answer' => 'No i want money'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'Do you like this game?',
            'answer' => 'It is the best'
        ]);

        Question::create([
            'stage' => '1',
            'question' => 'Will this game be a hit?',
            'answer' => 'It is already a hit'
        ]);

        Question::create([
            'stage' => '2',
            'question' => 'How do you see this idea?',
            'answer' => 'A wonderful one'
        ]);
    }
}
