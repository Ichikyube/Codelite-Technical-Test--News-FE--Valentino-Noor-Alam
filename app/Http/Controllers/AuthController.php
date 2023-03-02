<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function getlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $payload = [
            'email' => $email,
            'password' => $password,
        ];

        $auth = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."login",
            $payload,
        );

        if (!session()->isStarted()) {
            session()->start();
        }

        if ($auth['success'] == false) {
            return redirect('/login')->with('error', $auth['message']);
        }
        
        $token = $auth['access_token'];
        $token_type = $auth['token_type'];

        session()->put("token", "$token_type $token");

        session()->put("id_user", $auth['user']['id']);
        session()->put("username", $auth['user']['name']);
        return redirect('/')->with('success', "Log in success! Welcome");
    }

    public function logout(Request $request)
    {
        HttpClient::fetch(
            "GET", 
            HttpClient::apiUrl()."logout"
        );
        session()->flush();
        return redirect('/');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $payload = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if(strlen($request->input('new_password')) <6){
            return redirect()->back()->with(['error' => 'new password need at least 6 character long']);
        }

        $news = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."user/".session('id_user'),
            $payload,
        );

        return redirect('/')->with("success", "Password changed successfully!");


        


    }
}
