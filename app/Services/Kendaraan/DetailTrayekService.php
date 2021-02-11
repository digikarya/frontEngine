<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class DetailTrayekService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "trayek/detail";
    }
}

