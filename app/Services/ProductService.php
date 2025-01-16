<?php
namespace App\Services;

use App\Interfaces\ProductInterface;
use App\Repositories\ProductRepository;

class ProductService implements ProductInterface{
    protected $productRepository;
    public function __construct() {
        $this->productRepository = new ProductRepository();
    }

    public function saveProduct($userId,$request){
        $request->validate([
            'name' => 'required|string|max:255',
            'product_category' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Limit file type and size
            'description' => 'required|string',
        ]);
          if($request->product_id){
            return $this->productRepository->updateProduct($userId,$request);
          }
          else{
            return $this->productRepository->saveNewProduct($userId,$request);
          }
    }

 public function getProducts($userId){
    return $this->productRepository->getAllProducts($userId);
 }
 public function deleteProductDetails($id){
    return $this->productRepository->deleteProductData($id);
 }
}