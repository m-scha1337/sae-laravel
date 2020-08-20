<?php

use App\Models\Category;
use App\Models\User;
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
        factory(User::class)->create([

            'email' => 'admin@sae',
        ]);

        factory(User::class, 10)->create();

        $this->call(PostingSeeder::class);

        factory(Category::class, 10)->create();
    }
}
