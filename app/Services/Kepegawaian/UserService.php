<?php
namespace App\Services\Kepegawaian;


class UserService extends BaseServiceKegpegawaian{
    public function __construct()
    {
        $this->endpoint = "user";
    }
}

