<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class JenisKendaraanService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "jenis_kendaraan";
    }
}

