<?php
namespace App\Services\Kepegawaian;

class KaryawanService extends BaseServiceKegpegawaian{
    public function __construct()
    {
        $this->endpoint = "karyawan";
    }
}

