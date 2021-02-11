<?php
namespace App\Services\Kendaraan;
use App\Services\Kendaraan\BaseServiceKendaraan;

class LayoutService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "layout";
    }
}

