<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create();
    }
}
