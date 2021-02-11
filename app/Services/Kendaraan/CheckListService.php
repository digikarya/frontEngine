<?php
namespace App\Services\Kendaraan;

class CheckListService extends BaseServiceKendaraan{
    public function __construct()
    {
        $this->endpoint = "check_list";
    }
}

