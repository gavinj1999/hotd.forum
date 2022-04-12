<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
use RefreshDatabase;

public function list_of_ideas_shows_on_main_page()
{
    $this->get(route('ideas.index'));
}

}
