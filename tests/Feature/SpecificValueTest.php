<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpecificValueTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    /** @test */
  
    public function returns_an_array_with_name()
    {
        // Replace this with your actual API endpoint
        $response = $this->getJson('api/get-quote');

        
        $response->assertJsonStructure([
            'quotes' => [
                '*' => [ // '*' indicates any element in the array
                    // 'id',
                    'name',
                ]
            ]
        ]);
    }
}
