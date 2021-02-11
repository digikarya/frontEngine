<?php

namespace App\Http\Controllers;

use App\Services\Kendaraan\CheckListService;
use App\Services\Kendaraan\JenisKendaraanService;
use App\Services\Kendaraan\KategoriKendaraanService;
use App\Services\Kendaraan\LayoutService;
use App\Services\Kendaraan\TrayekService;
use App\Services\Kepegawaian\AgenService;
use App\Services\Kepegawaian\DaerahService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class SearchController extends Controller
{
    public function daerah(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "daerah",
                'value'  => $credentials['value'],
            );
            $this->services = new DaerahService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            if($sendRequest['status'] != 200){
                 return response()->json($sendRequest, 500);
            }
            return response()->json($sendRequest['data'], 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }

    public function checkList(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "daerah",
                'value'  => $credentials['value'],
            );
            $this->services = new CheckListService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            if($sendRequest['status'] != 200){
                 return response()->json($sendRequest, 500);
            }
            return response()->json($sendRequest, 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }

    public function agen(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "agen",
                'value'  => $credentials['value'],
            );
            $this->services = new AgenService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            if($sendRequest['status'] != 200){
                 return response()->json($sendRequest, 500);
            }
            return response()->json($sendRequest['data'], 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }


    public function layout(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "layout",
                'value'  => $credentials['value'],
            );
            $this->services = new LayoutService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            return response()->json($sendRequest, 200);
            if($sendRequest['status'] != 200){
                 return response()->json(array($sendRequest), 500);
            }
            return response()->json($sendRequest, 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }

    public function jenisKendaraan(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "layout",
                'value'  => $credentials['value'],
            );
            $this->services = new JenisKendaraanService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            return response()->json($sendRequest, 200);
            if($sendRequest['status'] != 200){
                 return response()->json(array($sendRequest), 500);
            }
            return response()->json($sendRequest, 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }

    public function kategoriKendaraan(Request $request){
        $credentials = $this->validate($request, [
            'value'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        try {
            $payload['condition'][] = array(
                'column'  => "kategoriKendaraan",
                'value'  => $credentials['value'],
            );
            $this->services = new KategoriKendaraanService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            if($sendRequest['status'] != 200){
                 return response()->json($sendRequest, 500);
            }
            return response()->json($sendRequest, 200);
        } catch (\Exception $th) {
            return response()->json(array(),500);
        }
    }
    public function trayek(Request $request){

        $validate = array(
            'searchby'  => 'required|boolean',
        );

        $credentials = $this->validate($request, $validate);

        if ($request->get('searchby') == "0"){
            $validate = array(
                 'kode'  => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            );
        }else{
            $validate = array(
                'asal'  => 'required|regex:/^[a-zA-Z\s]+$/',
                'tujuan'  => 'required|regex:/^[a-zA-Z\s]+$/',
            );
        }

        $credentials = $this->validate($request, $validate);
        try {
            if ($request->get('searchby') == "0"){
                if ($request->has('kode')){
                    $payload['condition'][] = array(
                        'column'  => "kode",
                        'value'  => $credentials['kode'],
                    );
                }

            }else{
                $payload['condition'][] = array(
                        'column'  => "asal",
                        'value'  => $credentials['asal'],
                );
                $payload['condition'][]  = array(
                        'column'  => "tujuan",
                        'value'  => $credentials['tujuan'],
                );
            }
            $this->services = new TrayekService();
            $this->setToken($request);
            $sendRequest = $this->services->post("/search",$payload);
            if($sendRequest['status'] != 200){
                 return response()->json($sendRequest, 500);
            }
            return response()->json($sendRequest['data'], 200);
        } catch (\Exception $th) {
            return response()->json(array("msg"=> $th->getMessage(),"asd"=>$validate),500);
        }
    }
}
