<?php
namespace App\Services\Kepegawaian;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Services\BaseService;

class DaerahService extends BaseServiceKegpegawaian{
    public function __construct()
    {
        $this->endpoint = "daerah";
    }
}

