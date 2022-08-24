<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_ids = Category::all()->pluck('id');
        $users_ids = User::all()->pluck('id');

        for ($i = 0; $i < 60; $i++) {
            $post = new Post;
            $post->slug = Post::getSlug($post->title);
            $post->title = $faker->words(rand(2, 4), true);
            $post->category_id = $faker->randomElement($categories_ids);
            $post->user_id = $faker->randomElement($users_ids);
            $post->image = 'https://picsum.photos/id/' . rand(1, 100) . '/500/300';
            // $nImg = rand(0, 284);
            // if ($nImg) {
            //     $picture = new File(__DIR__ . '/../../storage/app/content(' . $nImg . ').jpg');
            //     $post->image = Storage::put('uploads', $picture);
            // } else {
            //     $post->image = null;
            // }
            $post->content = $faker->paragraphs(rand(3, 6), true);
            $post->excerpt = $faker->paragraph();
            $post->save();
        }
    }
}
