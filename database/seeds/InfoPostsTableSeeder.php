<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\InfoPost;
use Faker\Generator as Faker;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // RECUPERAMI TUTTI I POSTS
        $posts = Post::all();
        // PER OGNI ISTANZA DI POSTS
        foreach ($posts as $post) {
            // CREA UN ISTANZA DI INFOPOSTS per ogni istanza di Posts
            $newInfoPost = new InfoPost();

            // la colonna post_id deve avere come valore il numero dell'iterazione passato dal foreach
            $newInfoPost->post_id = $post->id;
            $newInfoPost->post_status = $faker->randomElement('public','private','draft');
            $newInfoPost->comment_status = $faker->randomElement('open','close','private');

            // SALVO I DATI
            $newInfoPost->save();
        }
    }
}
