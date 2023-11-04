<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoriesService;

use Illuminate\Http\Request;

class ProductController  extends Controller
{
    protected $ProductService;
    protected $categoriesService;

    public function __construct(ProductService $productApiService,CategoriesService $categoriesService)
    {
        $this->productApiService = $productApiService;
        $this->CategoriesService = $categoriesService;
    }
    public function index(Request $request)
    {  
        $id = $request->input('id', 0);
        $selected_category = $request->input('category', ''); 

        $skip = $id;
        $limit = 8;
        if (!$this->categoriesService) {
            $this->categoriesService = new CategoriesService();
        }
      
        $products = $this->productApiService->getProductsData($skip, $limit);
        $categoriesList= $this->categoriesService->getCategoriesList();
        $nextPageUrl = $skip+8 ?? 8;
        $prevPageUrl = $skip-8 ?? 0;
        
        return view('products', ['products'=>$products['products'], 'nextPageUrl'=>$nextPageUrl, 'prevPageUrl'=>$prevPageUrl,'categoriesList'=>$categoriesList,'selected_category'=>$selected_category,'search'=>0]);
    }
    public function specificSearch(Request $request){
        $query = $request->searchField;
        if($query==''){
           $query = $request->input('searchField', '');
        }else{
            $searchField=$query;
        }
        $id = $request->input('id', 0);
        $selected_category = $request->input('category', ''); 

        $skip = $id;
        $limit = 8;
        if (!$this->categoriesService) {
            $this->categoriesService = new CategoriesService();
        }
      
        $products = $this->productApiService->getSpecificSearch($query,$skip, $limit);
        $categoriesList= $this->categoriesService->getCategoriesList();
        $nextPageUrl = $skip+8 ?? 8;
        $prevPageUrl = $skip-8 ?? 0;
        
        return view('products', ['products'=>$products['products'], 'nextPageUrl'=>$nextPageUrl, 'prevPageUrl'=>$prevPageUrl,'categoriesList'=>$categoriesList,'selected_category'=>$selected_category,'search'=>1,'searchField'=>$searchField]);
    
    }   
}
