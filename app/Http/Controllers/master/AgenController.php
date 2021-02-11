<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kepegawaian\AgenService;
use Illuminate\Http\Request;

class AgenController extends Controller
{

    public function __construct(AgenService $service)
    {
        $this->services = $service;
        $this->serviceName = "Agen";
        $this->endpoint = strtolower($this->serviceName);
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'nama'  => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'tipe'  => 'required|min:3|alpha',
            'telpon'  => 'required|min:3|numeric',
            'daerah'  => 'required|min:3|',
            'alamat'  => 'required|min:3|',
        ]);
        return array(
            'nama'      => $credentials['nama'],
            'tipe'      => $credentials['tipe'],
            'telpon'    => $credentials['telpon'],
            'whatsapp'  => $credentials['telpon'],
            'daerah_id' => $credentials['daerah'],
            'alamat'    => $credentials['alamat'],
        );
    }

}
