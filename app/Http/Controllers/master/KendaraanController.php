<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function __construct(KendaraanService $service)
    {
        $this->services = $service;
        $this->serviceName = "Kendaraan";
        $this->endpoint ="kendaraan";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'jenis_kendaraan'       => 'required|min:3|',
            'no_kendaraan'          => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'no_mesin'              => 'required|min:3|',
            'no_rangka'             => 'required|min:3|',
            'pemilik'               => 'required|min:3|',
            'max_seat'              => 'required|numeric',
            'daya_angkut'           => 'required|numeric',
            'tahun_pembuatan'       => 'required|min:4|max:4',
            'trayek_id'             => 'required|min:3|',
            'kategori_kendaraan_id' => 'required|min:3|',
            'kode_unit'             => 'required|min:3|',
            'kapasitas_mesin'       => 'required|numeric',
            'merk'                  => 'required|min:3',
            'no_body'               => 'required|min:3',

        ]);
        return array(
            'jenis_kendaraan'       => $credentials['jenis_kendaraan'],
            'no_kendaraan'          => $credentials['no_kendaraan'],
            'no_mesin'              => $credentials['no_mesin'],
            'no_rangka'             => $credentials['no_rangka'],
            'pemilik'               => $credentials['pemilik'],
            'max_seat'              => (int)$credentials['max_seat'],
            'daya_angkut'           => (int)$credentials['daya_angkut'],
            'tahun_pembuatan'       => $credentials['tahun_pembuatan'],
            'trayek_id'             => $credentials['trayek_id'],
            'kategori_kendaraan_id' => $credentials['kategori_kendaraan_id'],
            'kode_unit'             => $credentials['kode_unit'],
            'kapasitas_mesin'       => $credentials['kapasitas_mesin'],
            'merk'                  => $credentials['merk'],
            'no_body'               => $credentials['no_body'],
        );
    }
}
