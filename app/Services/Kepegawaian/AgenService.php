<?php
namespace App\Services\Kepegawaian;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Services\BaseService;

class AgenService extends BaseServiceKegpegawaian{
    public function __construct()
    {
        $this->endpoint = "agen";
    }
}

