<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class JadwalService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "jadwal";
    }
}

