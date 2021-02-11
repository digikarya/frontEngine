<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\TrayekService;
use Illuminate\Http\Request;

class TrayekController extends Controller
{
    public function __construct(TrayekService $service)
    {
        $this->services = $service;
        $this->serviceName = "trayek";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );
    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'no_trayek' => 'required|min:1|alpha_num',
            'asal'      => 'required|min:1|regex:/^[a-zA-Z0-9\s]+$/',
            'tujuan'    => 'required|min:1|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        return array(
            'no_trayek' => $credentials['no_trayek'],
            'asal'      => $credentials['asal'],
            'tujuan'    => $credentials['tujuan'],
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
