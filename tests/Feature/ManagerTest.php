<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManagerTest extends TestCase
{
    use DatabaseMigrations;

    protected $news;

    protected function setUp(): void
    {
        parent::setUp();

        $this->news = factory('App\News')->create();
    }

    /** @test */
    public function testUserCanBrowseManagerSection()
    {
        $response = $this->get('/manager');

        $response->assertSee($this->news->title);
    }
}
