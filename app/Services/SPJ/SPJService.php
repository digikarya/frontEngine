<?php
namespace App\Services\SPJ;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\SPJ\BaseServiceSPJ;

class SPJService extends BaseServiceSPJ{
    public function __construct()
    {
        $this->endpoint = "spj";
    }
}

