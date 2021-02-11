<?php

namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class LoginController extends Controller
{
    public function __construct(AuthService $services)
    {
        $this->services = $services;
    }

    public function index(Request $request){
        if($request->session()->exists('jwt') ) {
            return redirect('/');
        }
        return view('pages.login');
    }


    public function actLogout(Request $request){
        $request->session()->flush();
        return view('pages.login');
    }

    public function actLogin(Request $request) {
            $credentials = $this->validate($request, [
                'username'  => 'required|email|min:3',
                'password' => 'required|min:5',
            ]);
        try {

            $data = array(
                "username"=>$credentials['username'],
                "password"=>$credentials['password']
            );
            $sendRequest = $this->services->login($data);
            if($sendRequest['status'] != 200){
                return redirect('login')->with(['gagal' => $sendRequest['massage']]);
            }
            $request->session()->put($sendRequest["data"]);
            return redirect('/');
        } catch (\Exception $th) {
            return redirect()->back()->with(['gagal' => $th->getMessage()]);
        }

    }


}
