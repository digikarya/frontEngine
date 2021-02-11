<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class KategoriKendaraanService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "kategori_kendaraan";
    }
}

