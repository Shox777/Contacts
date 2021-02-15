<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails  = [];
        $emails[] = [
            'id' => 1,
            'email' => 'one@gmail.com',
            'contact_id' => 1,
        ];
        $emails[] = [
            'id' => 2,
            'email' => 'two@gmail.com',
            'contact_id' => 2,
        ];
        $emails[] = [
            'id' => 3,
            'email' => 'three@gmail.com',
            'contact_id' => 3,
        ];
        $emails[] = [
            'id' => 4,
            'email' => 'admin@gmail.com',
            'contact_id' => 4,
        ];
        $emails[] = [
            'id' => 5,
            'email' => 'example@gmail.com',
            'contact_id' => 5,
        ];
        $emails[] = [
            'id' => 6,
            'email' => 'test@gmail.com',
            'contact_id' => 6,
        ];
        $emails[] = [
            'id' => 7,
            'email' => 'seven@gmail.com',
            'contact_id' => 7,
        ];
        $emails[] = [
            'id' => 8,
            'email' => 'testing@gmail.com',
            'contact_id' => 2,
        ];

        DB::table('emails')->insert($emails);
    }
}
