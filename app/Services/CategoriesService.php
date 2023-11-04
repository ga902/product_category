<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CategoriesService{
  protected $baseUrl;
  
  public function __construct()
  {
      $this->baseUrl = 'https://dummyjson.com/products/categories';
  }
  public function getCategoriesList()
  {
      // $url = "https://dummyjson.com/products/categories";
      // $url = $this->baseUrl . "/products/categories";
      $response = Http::get($this->baseUrl);
      return $response->json();
  }
}
?>