<?php

namespace Tests\Unit;

use App\Http\Controllers\HomeController;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    // /**
    //  * A basic unit test example.
    //  *
    //  * @return void
    //  */
    /** @test */
    public function test_example()
    {
    
        $this->assertTrue(true);
    }

    public function it_checks_if_route_exists()
    {
        $router = app('router');

        $this->assertTrue($router->has('/home')); 
    }
}
