<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\KategoriKendaraanService;
use Illuminate\Http\Request;

class KategoriKendaraanController extends Controller
{
    public function __construct(KategoriKendaraanService $service)
    {
        $this->services = $service;
        $this->serviceName = "Kategori Kendaraan";
        $this->endpoint ="kategorikendaraan";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'nama'               => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'kode'               => 'required|min:3|alpha',
            'check_list_id'      => 'required|min:3|',
            'layout_id'          => 'required|min:3|',
            'jenis_kendaraan_id' => 'required|min:3|',
        ]);
        return array(
            'nama'               => $credentials['nama'],
            'kode'               => $credentials['kode'],
            'check_list_id'      => $credentials['check_list_id'],
            'layout_id'          => $credentials['layout_id'],
            'jenis_kendaraan_id' => $credentials['jenis_kendaraan_id'],
        );
    }
}
