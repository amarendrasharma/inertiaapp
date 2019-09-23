<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        $json = File::get('database/post.json');
        $data = json_decode($json);
        foreach ($data as $post) {
            Post::create([
                'uuid' => Str::uuid(),
                'title' => $post->title,
                'description' => $post->description,
                'publish_at' => $post->publish_at,
                'image' => null,
                'status' => $post->status,
                'category_id' => $post->category_id,
                'slug' => Str::slug($post->title),
                'user_id' => $post->user_id
            ]);
        }
    }
}
