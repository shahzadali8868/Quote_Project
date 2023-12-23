<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Quote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getQuote()
    {
        // $response = Http::get('https://api.kanye.rest');
        // $jsonData = $response->json();
        // dd($jsonData);

        $quote = [];
        for ($i = 0; $i <= 4; $i++) {
            $mapped = $this->callApi();
            // array_push($quote, $mapped);
            $quote[$i]=$mapped;
        }
        return response()->json(['quotes'=> $quote]);

    }

    function callApi()
    {
        $response = Http::get('https://api.kanye.rest');
        $jsonData = $response->json();

        return new Quote($jsonData);

    }
}
