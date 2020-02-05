<?php

namespace Tests\Feature;

use App\Bookmark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookmarksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_view_bookmarks_on_home()
    {

        $booksmarks = factory(Bookmark::class, 10)->create()->pluck('title');

        $response = $this->get('/');
        $response->assertStatus(200)
            ->assertSee('Delete')
            ->assertSeeInOrder($booksmarks->toArray());
    }

    /**
     * @test
     */
    public function can_create_new_bookmark()
    {
        $this->post('/', ['title' => 'New bookmark', 'url' => 'https://socialnerds.gr/workshops']);

        $this->get('/')->assertSee('New bookmark');
    }

    /**
     * @test
     */
    public function redirects_to_home_screen_after_bookmark_creation()
    {
        $response = $this->post('/', ['title' => 'New bookmark', 'url' => 'https://socialnerds.gr/workshops']);
        $response->assertRedirect('/');
    }

    /**
     * @test
     */
    public function can_delete_bookmark()
    {
        $bookmark = factory(Bookmark::class)->create(['title' => 'Deleted bookmark']);
        $this->delete('/' . $bookmark->id)->assertRedirect('/');
        $this->get('/')->assertDontSee('Deleted boomark');
    }
}
