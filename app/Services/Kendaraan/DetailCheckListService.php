<?php
namespace App\Services\Kendaraan;

class DetailCheckListService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "check_list/detail";
    }
}

