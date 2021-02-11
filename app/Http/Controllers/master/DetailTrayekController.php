<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Services\Kendaraan\DetailTrayekService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DetailTrayekController extends Controller
{
    public function __construct(DetailTrayekService $service)
    {
        $this->services = $service;
        $this->serviceName = "Detail Trayek";
        $this->endpoint = "trayek";
        $this->parsing = array(
            "title"  => $this->serviceName,
            "endpoint" => $this->endpoint,
        );

    }
    public function actValidate(Request $request){
        $credentials = $this->validate($request, [
            'agen_id'      => 'required|min:3|',
            'trayek_id'      => 'required|min:3|',
        ]);
        return array(
            'agen_id'      => $credentials['agen_id'],
            'trayek_id'      => $credentials['trayek_id'],
        );
    }


    public function actCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'agen_id'      => 'required|min:3|',
            'trayek_id'      => 'required|min:3|',
        ]);

        try {
            if($request->has('trayek_id')){
                if ($validator->fails()) {
                    $request->session()->put('tmpid', $request->get('trayek_id'));
                    return redirect()->route('trayek.show')->withErrors($validator)->with('gagal','Data detail check list gagal ditambahkan');
                }
                $payload =  array(
                    'agen_id'          => $request->get('agen_id'),
                    'trayek_id'          => $request->get('trayek_id'),
                );
                $this->setToken($request);
                $sendRequest = $this->services->post("/",$payload);
                if($sendRequest['status'] != 200){
                    $request->session()->put('tmpid', $request->get('trayek_id'));
                    return redirect()->route('trayek.show')->with('gagal','Data detail check list gagal ditambahkan');
                }
                $request->session()->put('tmpid', $request->get('trayek_id'));
                return redirect()->route('trayek.show')->with('succes','Data detail check list berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        } catch (\Exception $th) {
            $request->session()->put('tmpid', $request->get('trayek_id'));
            return redirect()->route('trayek.show')->with('gagal','Data detail check list gagak ditambahkan');
        }
    }


    public function actDelete(Request $request){
        if ($request->isMethod('delete')) {
            if($request->has('id') && $request->has('trayek_id')){
                $this->setToken($request);
                $result = $this->services->delete("/".$request->get('id'),array());
                if($result['status'] != 200){
                    $request->session()->put('tmpid', $request->get('trayek_id'));
                    return redirect()->route('trayek.show')->with('gagal','Data detail check list gagal dihapus');
                }
                $request->session()->put('tmpid', $request->get('trayek_id'));
                return redirect()->route('trayek.show')->with('succes','Data detail check list berhasil dihapus');
            }
        }
    }
}
