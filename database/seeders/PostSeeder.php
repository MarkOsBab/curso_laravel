<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        Post::truncate();
        for ($i=0; $i < 30 ; $i++) { 
            $c = Category::inRandomOrder()->first();
            $title = Str::random(20);
            Post::create(
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'content' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio est deserunt beatae deleniti aspernatur quisquam obcaecati minima voluptatem, ullam molestiae quaerat vitae eveniet neque alias laudantium rem nobis. Cumque, corporis.</p>',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                    'category_id' => $c->id,
                    'posted' => 'yes'
                ]
            );
        }
    }
}
