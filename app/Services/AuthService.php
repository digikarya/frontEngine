<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthService {
    protected $token;
    protected $baseURL = "http://localhost:8080/";
    protected $endpoint;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function login($payload){

        try {
            $response = Http::post($this->baseURL."login", $payload);
            $data = json_decode($response->getBody()->getContents(),true);
            if ($response->status() != 200){
                return array(
                    "status"=>$response->status(),
                    "massage"=>$data['Status']['Desc'],
                    "data"=>array()
                );
            }

            $tokenParts = explode(".", $data["Data"]["credential"]["access_token"]);
            if(count($tokenParts) < 3){
                return array(
                    "status"=>$response->status(),
                    "massage"=>"Username atau password salah",
                    "data"=>array()
                );
            }
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtPayload = json_decode($tokenPayload,true);
            return array(
                "status"=>200,
                "massage"=>"Succes",
                "data"=> array(
                    'user'=>$jwtPayload['username'],
                    'name'=>$jwtPayload['name'],
                    'role'=>$jwtPayload['role'],
                    'userid'=>$jwtPayload['user'],
                    'jwt'=>$data["Data"]["credential"]["access_token"],
                )
            );
        } catch (\Exception $th) {
            return array(
                "status"=>500,
                "massage"=>$th->getMessage(),
                "data"=>array()
            );
        }
    }

}
