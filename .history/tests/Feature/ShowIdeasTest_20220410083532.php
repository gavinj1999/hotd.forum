<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
use RefreshDatabase;

/**@test */
public function test_list_of_ideas_shows_on_main_page()
{
    $ideaOne = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of first Idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My Second Idea',
        'description' => 'Description of Second Idea'
    ]);

    $response = $this->get(route('idea.index'));

    $response->assertSuccessful();
    $response->assertSee($ideaOne->title);
    $response->assertSee($ideaOne->description);
    $response->assertSee($ideaTwo->title);
    $response->assertSee($ideaTwo->description);
    

}

/**@test */
public function test_single_idea_shows_correctly_on_the_show_page()
{
    $idea = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of first Idea'
    ]);


    $response = $this->get(route('idea.show', $idea));

    $response->assertSuccessful();
    $response->assertSee($idea->title);
    $response->assertSee($idea->description);


}

public function test_ideas_pagination_works(){
    Idea::factory(Idea::PAGINATION_COUNT +1)->create();

    $ideaOne = Idea::find(1);
    $ideaOne->title = 'My First Idea';
    $ideaOne->save();

    $ideaEleven = Idea::find(11);
    $ideaEleven->title = 'My Eleventh Idea';
    $ideaEleven->save();

    $response = $this->get('/');

    $response->assertSee($ideaOne->title);
    $response->assertDontSee($ideaEleven->title);



}


}
