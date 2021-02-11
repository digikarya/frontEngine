<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\CheckListService;
use Illuminate\Http\Request;

class CheckListKendaraanController extends Controller
{
    public function __construct(CheckListService $service)
    {
        $this->services = $service;
        $this->serviceName = "Check List Kendaaan";
        $this->endpoint = "checklist";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'merek'           => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'jenis_kendaraan' => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        return array(
            'merek'            => $credentials['merek'],
            'jenis_kendaraan' => $credentials['jenis_kendaraan'],
            'detail'=> array(),
        );
    }

    public function show(Request $request){
        $this->parsing["url"] = $this->endpoint;
        if($request->has('id') ||   $request->session()->has('tmpid') ) {
            $id = ($request->has('id') ? $request->get('id') : $request->session()->get('tmpid'));
            if ($request->session()->has('tmpid')){
                $request->session()->forget('tmpid');
            }
            $this->setToken($request);
            $result = $this->services->get("/".$id,array());
            if($result['status'] != 200){
                return redirect('/'.$this->endpoint)->with('gagal',$result['massage']);
            }
            $this->parsing["url"] .= ".update";
            $this->parsing["result"] = $result['data'];
        }else{
            $this->parsing["url"] .= ".create";
        }
        return view('pages.'.$this->endpoint.'.create',$this->parsing);
    }

}
