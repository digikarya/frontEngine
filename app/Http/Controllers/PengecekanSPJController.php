<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengecekanSPJController extends Controller
{
    public function index(Request $request){
        $this->setToken($request);
        $result = $this->services->get("/all?limit=100",array());
        $this->parsing["result"] = $result["data"];
        return view('pages.'.$this->serviceName.'.index',$this->parsing);
    }
}
