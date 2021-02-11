<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengecekanKendaraanController extends Controller
{


    public function __construct(Request $request)
    {
    //     $this->services = $service;
        $this->serviceName = "pengecekan";
        $this->url = "pengecekan";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint"=> $this->serviceName,
        );

    }
    public function index(Request $request){
        // $this->setToken($request);
        // $result = $this->services->get("/all?limit=100",array());
        // $this->parsing["result"] = $result["data"];
        // return view('pages.'.$this->serviceName.'.index',$this->parsing);
        return view('pages.pengecekan.index',$this->parsing);

    }





}
