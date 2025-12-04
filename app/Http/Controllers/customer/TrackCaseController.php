<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service; // model services
use Illuminate\Support\Facades\Validator;

class TrackCaseController extends Controller
{
  public function index(Request $request)
{
    // Generate captcha hanya jika belum ada
    if (!$request->session()->has('captcha_code')) {
        $captcha = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789'), 0, 5);
        $request->session()->put('captcha_code', $captcha);
    }

    $captcha = $request->session()->get('captcha_code');
    return view('customer.trackcase', compact('captcha'));
}

    // proses form, redirect ke journey jika ketemu
    public function check(Request $request)
    {

              $captchaSession = strtolower(session('captcha_code'));
    $captchaInput   = strtolower(trim($request->captcha_input));

    if ($captchaInput !== $captchaSession) {
        return back()->with('error', 'Captcha salah!')->withInput();
    }

        $v = Validator::make($request->all(), [
            'case_input' => 'required|string',
            'contact'    => 'required|string',
            // 'captcha' => 'required' // kalau mau aktifkan captcha
        ]);

        if ($v->fails()) {
            return redirect()->route('track.form')
                ->withErrors($v)
                ->withInput();
        }

        $caseInput = $request->case_input; // bisa COF ID atau SN
        $contact   = $request->contact;   // phone atau email

        // Cari di table services: cof_id OR serial_number matches AND phone_number OR email matches
        $service = Service::where(function($q) use ($caseInput) {
                        $q->where('cof_id', $caseInput)
                          ->orWhere('serial_number', $caseInput);
                    })
                    ->where(function($q) use ($contact) {
                        $q->where('phone_number', $contact)
                          ->orWhere('email', $contact);
                    })->first();

        if (! $service) {
            return redirect()->route('track.form')->with('error', 'Case tidak ditemukan atau contact tidak cocok. Cek kembali COF-ID / SN dan nomor/email.');
        }

        // Redirect ke halaman journey (show)
        return redirect()->route('track.journey', ['id' => $service->id]);
    }

    // tampilkan My Case Journey (detail)
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('customer.casejourney', compact('service')); // resources/views/customer/journey.blade.php
    }
}
