<?php
namespace App\Repositories;

use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductRepository{

    public function saveNewProduct($userId,$request){
        try{
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('products', 'public');
            } else {
                $filePath = null;
            }
            return Product::create([
                'user_id' => $userId,
                'name' => $request->name,
                'product_category' => $request->product_category,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'file' => $filePath,
            ]);
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'saveNewProduct',
                'line'=>$e->getLine(),
                'message'=>$e->getMessage()
            ]);
        }
    }

    public function getAllProducts($userId){
        try{
         return Product::where('user_id',$userId)->get();
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'getAllProducts',
                'line'=>$e->getLine(),
                'message'=>$e->getMessage()
                ]);
        }
    }
}