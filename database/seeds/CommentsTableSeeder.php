<?php

use App\Comment;
use App\BlogPost;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = BlogPost::all();
        if ($posts->count() < 1) {
            $this->command->info('Sorry, But there ain\'t no comment');
            return;
        }

        $commentCount = (int)$this->command->ask('Comment Count : ', 150);
        factory(Comment::class, $commentCount)->make()->each(function($comment) use ($posts){
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
