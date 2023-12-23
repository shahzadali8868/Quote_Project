<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseValueCountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    

    public function returns_an_array_with_five_values()
    {
        $response = $this->getJson('api/get-quote');

        // $this->assertEquals(2,count($response->json())); 
        $response->assertStatus(200)
        ->assertJsonCount(5, 'quotes');
    }
}
