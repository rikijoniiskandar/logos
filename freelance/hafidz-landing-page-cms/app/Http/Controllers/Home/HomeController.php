<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\FeaturedProduct;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $heroes = Hero::where('is_active', 1)->get();

        // $featured_product = FeaturedProduct::where('is_active', 1)->get();
        $clients = Client::get();

        // foreach ($featured_product as $product) {
        //     if (is_string($product->content)) {
        //         $product->content = json_decode($product->content, true);
        //     }
        // }

        return view('home.new-home')->with([
            'heroes' => $heroes,
            // 'featured_product' => $featured_product,
            'clients' => $clients
        ]);
    }
}
