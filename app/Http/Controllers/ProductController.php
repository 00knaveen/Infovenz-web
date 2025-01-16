<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;
    public function __construct() {
        $this->productService = new ProductService();
    }

    public function addProduct(Request $request){
      $userId = Auth::user()->id;
       $result = $this->productService->saveProduct($userId,$request);
       
       if($result && $request->product_id){
        return redirect()->route('dashboard')->with('status-success','Product Updated Successfully');
       }
      else if($result){
        return redirect()->route('dashboard')->with('status-success','Product Added Successfully');
       }
       else{
        return redirect()->route('dashboard')->with('status-failed','Failed to Add Product');
       }
    }
    public function getProudcts(){
        $userId = Auth::user()->id;
        $products = $this->productService->getProducts($userId);
        return view('product-list',compact('products'));
    }
    public function deleteProduct($id){
        if($id){
          $data = $this->productService->deleteProductDetails($id);
         if($data){
            return redirect()->route('dashboard')->with('status-success','Product deleted Successfully');
         }
         else{
            return redirect()->route('dashboard')->with('status-failed','Failed to Product delete');

         }
        }
        else{
            return redirect()->route('dashboard')->with('status-failed','Failed to Product delete');

        }
    }
}
