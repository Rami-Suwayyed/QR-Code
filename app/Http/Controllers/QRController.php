<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{

    public function index()
    {
        return view('qr_code.qr_builder');
    }


    public function Builder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $body = $request->input('body');
        $code = Str::slug($name) . '.' . $name;
        $code = QrCode::generate($body);
        $qr = QrCode::format('png');
        $qr->generate($body, '../public/qr_code/' . $code);


        return back()->with([
            'status' => 'QR Code generated successfully!',
            'code' => $code
        ]);


    }

//    public function phone()
//    {
//        return view('qr_codes.qr_phone');
//    }
//
//    public function email()
//    {
//        return view('qr_codes.qr_email');
//    }
//
//    public function geo()
//    {
//        return view('qr_codes.qr_geo');
//    }
//
//    public function sms()
//    {
//        return view('qr_codes.qr_sms');
//    }

}
