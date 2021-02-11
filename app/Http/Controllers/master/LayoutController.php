<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\LayoutService;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function __construct(LayoutService $service)
    {
        $this->services = $service;
        $this->serviceName = "Layout";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'nama'          => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'baris_kiri'    => 'required|min:1|numeric',
            'baris_kanan'   => 'required|min:1|numeric',
            'kolom_kiri'    => 'required|min:1|numeric',
            'kolom_kanan'   => 'required|min:1|numeric',
            'seat_belakang' => 'required|min:0|numeric',
        ]);
        return array(
            'nama'          => $credentials['nama'],
            'baris_kiri'    => (int)$credentials['baris_kiri'],
            'baris_kanan'   => (int)$credentials['baris_kanan'],
            'kolom_kiri'    => (int)$credentials['kolom_kiri'],
            'kolom_kanan'   => (int)$credentials['kolom_kanan'],
            'seat_belakang' => (int)$credentials['seat_belakang'],
            'total_seat'    => 10,
        );

    }
}
