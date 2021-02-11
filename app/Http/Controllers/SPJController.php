<?php

namespace App\Http\Controllers;

use App\Services\Kepegawaian\BaseServiceSPJ;
use App\Services\SPJ\SPJService;
use Illuminate\Http\Request;

class SPJController extends Controller
{
    public function __construct(SPJService $service)
    {
        $this->services = $service;
        $this->serviceName = "SPJ";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );
    }


    // public function actValidate(Request $request){
    // }

    // public function index(Request $request){

    // }

    public function index(Request $request){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        return view('pages.spj.index',$this->parsing);

    }


    public function showDetail($id){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        $this->parsing['id'] = $id;
        return view('pages.spj.info',$this->parsing);

    }

    // public function create(Request $request){
    //     // $this->setToken($request);
    //     // $result = $this->services->get("/all?limit=100",array());
    //     // $this->parsing["result"] = $result["data"];
    //     // return view('pages.'.$this->serviceName.'.index',$this->parsing);
    //     return view('pages.spj.create',$this->parsing);
    // }



    public function checkin(Request $request){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        return view('pages.spj.checkin',$this->parsing);
    }


    public function checkout(Request $request){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        $this->parsing["agen"] = "id";
        return view('pages.spj.info',$this->parsing);
    }

    public function konfirmasi(Request $request){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        return view('pages.spj.konfirmasi',$this->parsing);
    }

    public function actKonfirmasi(Request $request){
        // return view('pages.spj.checkout',$this->parsing);
    }
}
