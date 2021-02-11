<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kepegawaian\KaryawanService;
use App\Services\Kepegawaian\UserService;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct(Request $request, KaryawanService $service)
    {
        $this->services = $service;
        $this->serviceName = "Karyawan";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint"=> $this->endpoint,
        );
    }

    public function actValidate(Request $request)
    {

        $credentials = $this->validate($request, [
            'nama'          => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'no_identitas'  => 'required|min:3|numeric',
            'telepon'       => 'required|min:3|numeric',
            'alamat'        => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'jenis_kelamin' => 'required|min:3|alpha',
            'jabatan'       => 'required|min:3|alpha',
        ]);
        return array(
            'nama'          => $credentials['nama'],
            'no_identitas'  => $credentials['no_identitas'],
            'telepon'       => $credentials['telepon'],
            'alamat'        => $credentials['alamat'],
            'jenis_kelamin' => $credentials['jenis_kelamin'],
            'jabatan'       => $credentials['jabatan'],
        );
    }

     public function show(Request $request){
        $this->parsing["url"] = $this->endpoint;
        if($request->has('id') ||   $request->session()->has('tmpid') ) {
            $this->setToken($request);
            $id = ($request->has('id') ? $request->get('id') : $request->session()->get('tmpid'));
            if ($request->session()->has('tmpid')){
                $request->session()->forget('tmpid');
            }
            $result = $this->services->get("/".$id,array());
            if($result['status'] != 200){
                return redirect('/'.$this->endpoint)->with('gagal',$result['massage']);
            }
            $this->parsing["url"] .= ".update";
            $this->parsing["result"] = $result['data'];
            $result = $this->services->get("/user"."/".$id,array());
            // if($result['status'] != 200){
            //     return redirect('/'.$this->endpoint)->with('gagal',$result['massage']);
            // }
            $this->parsing["detail"] = $result['data'];
        }else{
            $this->parsing["url"] .= ".create";
        }

        return view('pages.'.$this->endpoint.'.create',$this->parsing);
    }

}
