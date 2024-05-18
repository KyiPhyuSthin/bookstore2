<?php

namespace App\Http\Controllers\WEBSITE;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserAddress;

class AuthController extends Controller
{
    //
    public function signIn(Request $request)
    {
        $remember = false;
        if($request->remember){
            $remember = true;
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            return redirect()->back();
        }
        else{
            return redirect()->route('website.user_sign_in');
        }
    }

    public function signOut(Request $request)
    {
        $request->session()->invalidate();

        return redirect()->route('website.home');
    }

    public function register(Request $request)
    {
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::create($userData);

        $addressData = [
            'user_id' => $user->id,
            'name' => $request->address_name,
            'phone' => $request->address_phone,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'city' => $request->city,
            'is_remote' => $request->is_remote
        ];

        UserAddress::create($addressData);

        Auth::loginUsingId($user->id);

        return redirect()->route('website.home');
    }
}
