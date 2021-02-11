<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $services;
    protected $serviceName;
    protected $parsing;


    public function setToken(Request $request){
        if ($request->session()->exists('jwt') ) {
            $this->services->setHeader("Authorization","Bearer ".$request->session()->get("jwt"));
        }
    }

    public function actValidate(Request $request){
        return array();
    }


    public function index(Request $request){
        $this->setToken($request);
        $result = $this->services->get("/all?limit=100",array());
        $this->parsing["result"] = $result["data"];
        return view('pages.'.$this->endpoint.'.index',$this->parsing);
    }

    public function show(Request $request){
        $this->parsing["url"] = $this->endpoint;
        if($request->has('id')){
            $this->setToken($request);
            $result = $this->services->get("/".$request->get('id'),array());
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


    public function actCreate(Request $request){
        $payload = $this->actValidate($request);
        try {
            $this->setToken($request);
            $sendRequest = $this->services->post("",$payload);
            if($sendRequest['status'] != 200){
                return redirect()->back()->withInput()->with(['gagal' => $sendRequest['massage']]);
            }
            return redirect('/'.$this->endpoint)->with(['success' => $sendRequest['massage']]);
        } catch (\Exception $th) {
            return redirect()->back()->with(['gagal' => $th->getMessage()]);
        }
    }

    public function actUpdate(Request $request){
        try {
            $payload = $this->actValidate($request);
            $this->setToken($request);
            if(!$request->has('id')){
                return redirect('/'.$this->endpoint)->with(['gagal' => "Tidak di ijinkan"]);
            }
            $sendRequest = $this->services->update("/".$request->get('id'),$payload);
            if($sendRequest['status'] != 200){
                return redirect('/'.$this->endpoint)->with(['gagal' => $sendRequest['massage']]);
            }
            return redirect('/'.$this->endpoint)->with(['success' => $sendRequest['massage']]);
        } catch (\Exception $th) {
            return redirect('/'.$this->endpoint)->with(['gagal' => $th->getMessage()]);
        }
    }

    public function actDelete(Request $request){
        if ($request->isMethod('delete')) {
            if($request->has('id')){
                $this->setToken($request);
                $result = $this->services->delete("/".$request->get('id'),array());
                if($result['status'] != 200){
                    return redirect("/".$this->endpoint)->with('gagal',$result['massage']);
                }
                return redirect("/".$this->endpoint)->with('success',$result['massage']);
            }
        }
    }


}
