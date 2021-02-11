<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class TrayekService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "trayek";
    }
}

