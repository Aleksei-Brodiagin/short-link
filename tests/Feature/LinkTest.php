<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_link_store_test()
    {
        $url = $this->faker->url();

        $response = $this->post(route('link.store'), ['url' => $url]);

        $this->assertDatabaseHas('links', [
            'url' => $url,
        ]);

        $response->assertOk();
        $code = $response->getContent();
        $this->assertNotEquals('', $code);
    }

    public function test_link_show_test()
    {
        $url = $this->faker->url();

        $response = $this->post(route('link.store'), ['url' => $url]);
        $code = $response->getContent();

        $response = $this->get(route('link.show', ['code', $code]));
        $response->assertRedirect();
    }
}
