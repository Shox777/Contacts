<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones  = [];
        $phones[] = [
            'id' => 1,
            'phone' => +601133948607,
            'contact_id' => 1,
        ];
        $phones[] = [
            'id' => 2,
            'phone' => +80056789798,
            'contact_id' => 2,
        ];
        $phones[] = [
            'id' => 3,
            'phone' => +998999777777,
            'contact_id' => 3,
        ];
        $phones[] = [
            'id' => 4,
            'phone' => +70611779955,
            'contact_id' => 4,
        ];
        $phones[] = [
            'id' => 5,
            'phone' => +101336644771,
            'contact_id' => 5,
        ];
        $phones[] = [
            'id' => 6,
            'phone' => +998711112233,
            'contact_id' => 6,
        ];
        $phones[] = [
            'id' => 7,
            'phone' => +998977777777,
            'contact_id' => 7,
        ];
        $phones[] = [
            'id' => 8,
            'phone' => +998977775555,
            'contact_id' => 3,
        ];

        DB::table('phones')->insert($phones);
    }
}
