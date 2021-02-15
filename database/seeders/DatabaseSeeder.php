<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::factory(7)->create();

        $this->call([
            EmailSeeder::class,
            PhoneSeeder::class
        ]);
    }
}
