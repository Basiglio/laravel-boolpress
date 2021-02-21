<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            // DEFINISCO NUOVA ISTANZA OGGETTO POST
            $newPost = new Post();

            // DEFINISCO CHIAVE VALORE DA INIETTARE NEL DB
            $newPost->title = $faker->text(50);
            $newPost->subtitle = $faker->text(20);
            $newPost->author = $faker->name;
            $newPost->text = $faker->text(5000);

            // SALVO I DATI
            $newPost->save();
        }
    }
}
