<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\JadwalService;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct(JadwalService $service)
    {
        $this->services = $service;
        $this->serviceName = "Jadwal";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'waktu_keberangkatan' => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'waktu_kedataangan'   => 'required|min:3|alpha',
            'trayek_id'           => 'required|min:3|numeric',
        ]);
        return array(
            'waktu_keberangkatan' => $credentials['waktu_keberangkatan'],
            'waktu_kedataangan'   => $credentials['waktu_kedataangan'],
            'trayek_id'           => $credentials['trayek_id'],
        );
    }
}
