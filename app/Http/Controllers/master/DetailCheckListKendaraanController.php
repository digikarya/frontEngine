<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\CheckListService;
use App\Services\Kendaraan\DetailCheckListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailCheckListKendaraanController extends Controller
{
    public function __construct(DetailCheckListService $service)
    {
        $this->services = $service;
        $this->serviceName = "Detail Check List Kendaaan";
        $this->endpoint = "checklist";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'nama'           => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'tipe' => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'check_list_id' => 'required|min:3|',
        ]);
        return array(
            'nama'            => $credentials['nama'],
            'tipe' => $credentials['tipe'],
            'check_list_id' => $credentials['check_list_id'],
        );
    }


    public function actCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'nama'          => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'tipe'          => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'check_list_id' => 'required|min:3|',
        ]);

        try {
            if($request->has('check_list_id')){
                if ($validator->fails()) {
                    $request->session()->put('tmpid', $request->get('check_list_id'));
                    return redirect()->route('checklist.show')->withErrors($validator)->with('gagal','Data detail check list gagal ditambahkan');
                }
                $payload =  array(
                    'nama'          => $request->get('nama'),
                    'tipe'         =>"interior",
                    'check_list_id' => $request->get('check_list_id'),
                );
                $this->setToken($request);
                $sendRequest = $this->services->post("/",$payload);
                if($sendRequest['status'] != 200){
                    $request->session()->put('tmpid', $request->get('check_list_id'));
                    return redirect()->route('checklist.show')->with('gagal','Data detail check list gagal ditambahkan');
                }
                $request->session()->put('tmpid', $request->get('check_list_id'));
                return redirect()->route('checklist.show')->with('succes','Data detail check list berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        } catch (\Exception $th) {
            $request->session()->put('tmpid', $request->get('check_list_id'));
            return redirect()->route('checklist.show')->with('gagal','Data detail check list gagak ditambahkan');
        }
    }


    public function actDelete(Request $request){
        if ($request->isMethod('delete')) {
            if($request->has('id') && $request->has('check_list_id')){
                $this->setToken($request);
                $result = $this->services->delete("/".$request->get('id'),array());
                if($result['status'] != 200){
                    $request->session()->put('tmpid', $request->get('check_list_id'));
                    return redirect()->route('checklist.show')->with('gagal','Data detail check list gagal dihapus');
                }
                $request->session()->put('tmpid', $request->get('check_list_id'));
                return redirect()->route('checklist.show')->with('succes','Data detail check list berhasil dihapus');
            }
        }
    }

}
