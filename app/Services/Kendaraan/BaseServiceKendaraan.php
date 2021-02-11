<?php
namespace App\Services\Kendaraan;
use Illuminate\Support\Facades\Http;

class BaseServiceKendaraan{

    protected $token;
    protected $header;
    protected $baseURL = "http://localhost:8081/";


    public function setHeader($key,$value){
        $this->header[$key] = $value;
    }

    public function get($url,$payload){
        try {

            $response = Http::withHeaders($this->header)->get($this->baseURL.$this->endpoint.$url, $payload);

            $data = json_decode($response->getBody()->getContents(),true);
            if ($response->status() != 200){
                return array(
                    "status"=>$response->status(),
                    "massage"=>$data['Status']['Desc'],
                    "data"=>array()
                );
            }
            return array(
                "status"=>200,
                "massage"=>"Succes",
                "data"=>$data['Data']
            );
        } catch (\Exception $th) {
            return array(
                "status"=>500,
                "massage"=>$th->getMessage(),
                "data"=>array()
            );
        }
    }
    public function post($url,$payload){
        try {
            $response = Http::withHeaders($this->header)->post($this->baseURL.$this->endpoint.$url, $payload);
            $data = json_decode($response->getBody()->getContents(),true);
            if ($response->status() != 200){
                return array(
                    "status"=>$response->status(),
                    "massage"=>$data['Status']['Desc'],
                    "data"=>array()
                );
            }
            return array(
                "status"=>200,
                "massage"=>"Succes",
                "data"=>$data['Data']
            );
        } catch (\Exception $th) {
            return array(
                "status"=>500,
                "massage"=>$th->getMessage(),
                "data"=>array()
            );
        }
    }
    public function update($url,$payload){
        try {
            $response = Http::withHeaders($this->header)->put($this->baseURL.$this->endpoint.$url, $payload);
            $data = json_decode($response->getBody()->getContents(),true);
            if ($response->status() != 200){
                return array(
                    "status"=>$response->status(),
                    "massage"=>$data['Status']['Desc'],
                    "data"=>array()
                );
            }
            return array(
                "status"=>200,
                "massage"=>"Succes",
                "data"=>$data['Data']
            );
        } catch (\Exception $th) {
            return array(
                "status"=>500,
                "massage"=>$th->getMessage(),
                "data"=>array()
            );
        }
    }
    public function delete($url,$payload){
        try {
            // if($this->setHeader() != 200){
            //     return array(
            //         "status"=>500,
            //         "massage"=>"gagal",
            //         "data"=>array()
            //     );
            // }
            $response = Http::withHeaders($this->header)->delete($this->baseURL.$this->endpoint.$url);
            $data = json_decode($response->getBody()->getContents(),true);
            if ($response->status() != 200){
                return array(
                    "status"=>$response->status(),
                    "massage"=>$data['Status']['Desc'],
                    "data"=>array()
                );
            }
            return array(
                "status"=>200,
                "massage"=>"Succes",
                "data"=>$data['Data']
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
