<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kepegawaian\DaerahService;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function __construct(Request $request,DaerahService $service)
    {
        $this->services = $service;
        $this->serviceName = "Daerah";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint"=> $this->endpoint,
        );

    }

    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'kecamatan'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'kabupaten'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'provinsi'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        return array(
            'kecamatan'  => $credentials['kecamatan'],
            'kabupaten'  => $credentials['kabupaten'],
            'provinsi'  => $credentials['provinsi'],
        );
    }


}

