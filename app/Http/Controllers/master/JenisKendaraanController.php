<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\JenisKendaraanService;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function __construct(JenisKendaraanService $service){
        $this->services = $service;
        $this->serviceName = "jeniskendaraan";
        $this->endpoint = "jeniskendaraan";
        $this->parsing = array(
            "title"  => "Jenis Kendaraan",
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'nama'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'kode'  => 'required|min:3|alpha',
            'jenis'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        return array(
            'nama'      => $credentials['nama'],
            'kode'      => $credentials['kode'],
            'jenis'    => $credentials['jenis'],
        );
    }
}
