<?php

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
        $user = new App\User;
        $user->name = "Danny Festor";
        $user->username = "Danakin";
        $user->email = "danny.festor@gmail.com";
        $user->role = "admin";
        $user->password = "$2y$10$7sH1RlAVGAyTbDJDCjoBkuGbO7wcgs96PsCyaFOalo6rG/0.n70LC";
        $user->save();

        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->posts()->createMany(factory(App\Post::class, 10)->make()->toArray());
        });

        factory(App\Tag::class, 20)->create();
    }
}
