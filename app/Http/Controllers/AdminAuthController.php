<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            "username" => "required",
            "password" => "required|min:8"
        ]);

        $remember = false;
        if($request->remember){
            $remember = true;
        }

        if(Auth::guard('management_web')->attempt($validatedData, $remember)){
            return redirect()->route('management.orders.index');
        }
        else{
            return redirect()->route('management.sign_in');
        }
    }
}
