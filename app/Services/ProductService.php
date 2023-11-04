<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProductService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://dummyjson.com/';
    }

    public function getProductsData($skip = 0, $limit = 8)
    {
        $url = $this->baseUrl . "products?skip=$skip&limit=$limit";
        $response = Http::get($url);
        return $response->json();
    }
    
    public function getSpecificSearch($query,$skip = 0, $limit = 8)
    {
      $url = $this->baseUrl . "products/search?q=" . $query . "&skip=" . $skip . "&limit=" . $limit;

        // $url = $this->baseUrl . "products/search?q=$query?skip=$skip&limit=$limit";
        $response = Http::get($url);
        return $response->json();
    }
}
