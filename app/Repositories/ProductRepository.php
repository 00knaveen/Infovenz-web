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
public function updateProduct($userId,$request){
    try{
        $product = Product::find($request->product_id);
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('products', 'public');
            } else {
                $filePath = $request->file;
           }
        $product->update([
            'name' => $request->name,
            'user_id'=>$userId,
            'product_category' => $request->product_category,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'file' => $filePath,
            ]);
            return $product;
    }
    catch(\Exception $e){
        Log::info([
            'function'=>'updateProduct',
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

    public function deleteProductData($id){
        try{
            return product::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'deleteProductData',
                'line'=>$e->getLine(),
                'message'=>$e->getMessage()
            ]);
        }
    }
}