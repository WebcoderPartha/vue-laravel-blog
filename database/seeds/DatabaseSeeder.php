<?php

use App\User;
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
        // $this->call(UserSeeder::class);
        $this->call(PostSeederTable::class);
        $this->call(CategorySeederTable::class);
        factory(User::class, 10)->create();
    }
}
