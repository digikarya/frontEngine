<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class KendaraanService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "kendaraan";
    }
}

