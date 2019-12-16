<?php

namespace Tests\Feature;

use App\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No Blog Posts Yet !!!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        $post = new BlogPost();
        $post->title = 'New title from test';
        $post->content = 'Content of Post from test';
        $post->save();

        $response = $this->get('/posts');
        $response->assertSeeText('New title from test');
        $this->assertDatabaseHas('blog_posts',[
            'title' => 'New title from test'
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'At least 10 characters', 
        ];
        $this->post('/posts',$params)
            ->assertStatus(302)
            ->assertSessionHas('success');
        $this->assertEquals(session('success'),'Blog Post Has Been Created Successfuly.');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'X',
            'content' => 'xx', 
        ];
        $this->post('/posts',$params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
        $message = session('errors')->getMessages();
        $this->assertEquals($message['title'][0],'The title must be at least 5 characters.');
        $this->assertEquals($message['content'][0],'The content must be at least 10 characters.');
    }

    public function testUpdateValid()
    {
        $post = new BlogPost();
        $post->title = 'New title from test';
        $post->content = 'Content of Post from test';
        $post->save();

        $this->assertDatabaseHas('blog_posts',$post->toArray());

        $params = [
            'title' => 'New Update From Test !',
            'content' => 'Content was changed by test update !?!', 
        ];
        $this->put("/posts/{$post->id}",$params)
            ->assertStatus(302)
            ->assertSessionHas('success');
        $this->assertEquals(session('success'),'Blog post has been updated.');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
        $this->assertDatabaseHas('blog_posts',[
            'title' => 'New Update From Test !',
            'content' => 'Content was changed by test update !?!', 
        ]);
    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts',$post->toArray());

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('danger');
        $this->assertEquals(session('danger'),'Blog post has been deleted!');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = 'New title from test';
        $post->content = 'Content of Post from test';
        $post->save();

        return $post;
    }
}
