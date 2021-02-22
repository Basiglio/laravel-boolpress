<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'php',
            'laravel',
            'javascript',
            'html',
            'css',
        ];

        foreach ($tags as $tag) {
            // creazione istanza
            $newTag = new Tag;
            // VALORIZZO PROPRIETà
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);

            // SALVATAGGIO
            $newTag->save();



        }
    }
}
