<?php

namespace Tests\Feature;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNewsTest extends TestCase
{
    use DatabaseMigrations;

    protected $news;

    protected function setUp(): void
    {
        parent::setUp();

        $this->news = factory('App\News')->create();
    }

    /** @test */
    public function testUserCanDeleteNews()
    {
        $news = factory('App\News')->create();
        $response = $this->JSON('DELETE', route('news.delete', ['news' => $news->id]));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('news', ['id' => $news->id]);
    }

    /** @test */
    public function testUserCanSeeCreateNewsForm()
    {
        $this->get(route('news.create_form'))
            ->assertStatus(200);
    }

    /** @test */
    public function testUserCanCreateNews()
    {
        $news = factory('App\News')->make();

        $response = $this->post('/news', $news->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($news->title)
            ->assertSee($news->body);
    }

    /** @test Validation */
    public function testNewsRequireTitle()
    {
        $this->publishNews(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test Validation */
    public function testNewsRequireBody()
    {
        $this->publishNews(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test Validation */
    public function testNewsRequireCategory()
    {
        $this->publishNews(['category_id' => null])
            ->assertSessionHasErrors('category_id');
    }

    /** @test */
    public function testUserCanSeeUpdateForm()
    {
        $this->get(route('news.edit_form', ['news' => $this->news->id]))
            ->assertStatus(200);
    }

    /** @test */
    public function testNewsCanBeUpdated()
    {
        $updateRoutePath = route('news.update', ['news' => $this->news->id]);

        $this->patchJson($updateRoutePath, [
            'category_id' => $this->news->category_id,
            'title' => 'Changed Title',
            'body' => 'Changed Body'
        ]);

        $newsInDatabase = News::find($this->news->id);

        $this->assertEquals('Changed Title', $newsInDatabase->title);
        $this->assertEquals('Changed Body', $newsInDatabase->body);

    }

    public function publishNews($overrides = [])
    {
        $this->withExceptionHandling();
        $news = factory('App\News')
            ->make($overrides);
        return $this->post('/news', $news->toArray());
    }


}
