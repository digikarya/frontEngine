<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kepegawaian\UserService;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
     public function __construct(UserService $service)
    {
        $this->services = $service;
        $this->serviceName = "User";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint"=> $this->endpoint,
        );
    }

    public function actValidate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'password' => 'required|min:3|',
            'role'     => 'required|min:3|',
            'karyawan' => 'required|min:3|',
            'agen'     => 'required|min:3|',
        ]);

        if ($validator->fails()) {
            return redirect()->route('karyawan.show')
                        ->withErrors($validator)
                        ->withInput();
        }
        return array(
            'email'       => $validator['email'],
            'password'    => $validator['password'],
            'role'        => $validator['role'],
            'karyawan_id' => $validator['karyawan'],
            'agen_id'     => $validator['agen'],
        );
    }

    public function show(Request $request){
        if($request->has('karyawan_id')){
            $this->parsing["url"] = $this->endpoint.".create";
            $credentials = $this->validate($request, [
                'karyawan_id' => 'required|min:3|',
                'nama'        => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            ]);
            $this->parsing["nama"] = $credentials["nama"];
            $this->parsing["karyawan_id"] = $credentials["karyawan_id"];
            return view('pages.karyawan.user-create',$this->parsing);
        }else{
            return redirect('/');
        }

    }

    public function actCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|min:3|',
            'password' => 'required|min:3|',
            'role'     => 'required|min:3|',
            'karyawan' => 'required|min:3|',
            'agen'     => 'required|min:3|',
        ]);

        try {
            if($request->has('karyawan')){
                if ($validator->fails()) {
                    $request->session()->put('tmpid', $request->get('karyawan'));
                    return redirect()->route('karyawan.show')->withErrors($validator);
                }
                $payload =  array(
                    'email'       => $request->get('email'),
                    'password'    => $request->get('password'),
                    'role'        => $request->get('role'),
                    'karyawan_id' => $request->get('karyawan'),
                    'agen_id'     => $request->get('agen'),
                );
                $this->setToken($request);
                $sendRequest = $this->services->post("",$payload);
                if($sendRequest['status'] != 200){
                    $request->session()->put('tmpid', $request->get('karyawan'));
                    return redirect()->route('karyawan.show')->with('gagal','Data user gagal ditambahkan');
                }
                $request->session()->put('tmpid', $request->get('karyawan'));
                return redirect()->route('karyawan.show')->with('succes','Data user berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        } catch (\Exception $th) {
            $request->session()->put('tmpid', $request->get('karyawan'));
            return redirect()->route('karyawan.show')->with('gagal','Data user berhasil ditambahkan');
        }
    }
}
