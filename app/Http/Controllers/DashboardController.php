<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $productService;
    public function __construct() {
        $this->productService = new ProductService();
    }

    public function dashboard(){
        $userId = Auth::user()->id;
        $products = $this->productService->getProducts($userId);
        return view('dashboard',compact('products'));
    }
}
