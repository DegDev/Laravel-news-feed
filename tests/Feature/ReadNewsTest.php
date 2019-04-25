<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadNewsTest extends TestCase
{
    use DatabaseMigrations;

    protected $news;

    protected function setUp(): void
    {
        parent::setUp();

        $this->news = factory('App\News')->create();
    }

    /** @test */
    function testUserCanBrowseAllNews()
    {
        $this->get('/')
            ->assertSee($this->news->title);
    }

    /** @test */
    function testUserCanReadSingleNews()
    {

        $this->get($this->news->path())
            ->assertSee($this->news->title);
    }

    /** @test */
    public function testUserCanFilterNewsByCategory()
    {
        $category = factory('App\Category')->create();

        $newsInChannel = factory('App\News')->create(['category_id' => $category->id]);

        $newsNotInChannel = factory('App\News')->create();

        $this->get('/news/' . $category->slug)
            ->assertSee($newsInChannel->title)
            ->assertDontSee($newsNotInChannel->title);

    }


}
