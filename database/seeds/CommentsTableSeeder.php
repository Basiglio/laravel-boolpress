<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();


        foreach ($posts as $post) {
            // per ogni istanza di posts crea una nuova istanza commenti
            $newComment = new Comment();
            for ($i=0; $i < 3; $i++) {
                // ripeti la creazione per 3 volte
                $newComment->post_id = $post->id;
                $newComment->author = $faker->userName;
                $newComment->text = $faker->sentence(10);

                $newComment->save();
            }
        }
    }
}
