<?php

namespace Database\Seeders;

use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prize::create([
            'stage' => '1',
            'prize' => '50'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '100'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '500'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '1000'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '30'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '300'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '3000'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '700'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '70'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '700'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '7000'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '600'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '60'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '6000'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '150'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '489'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '450'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '1500'
        ]);

        Prize::create([
            'stage' => '1',
            'prize' => '780'
        ]);

        Prize::create([
            'stage' => '2',
            'prize' => '9580'
        ]);
    }
}
