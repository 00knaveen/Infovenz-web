<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class RegisterRepository{

    public function registerNewUser($request) : int{
        try{

            return User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'registerNewUser',
                'line'=>$e->getLine(),
                'message'=>$e->getMessage()
            ]);
        }
    }
}