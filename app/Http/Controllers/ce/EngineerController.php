<?php

namespace App\Http\Controllers\ce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Service;


class EngineerController extends Controller
{
    // =======================
    // Halaman Engineer
    // =======================
public function index()
{
    // Ambil user login
    $username = Session::get('username');
    $user = \App\Models\User::where('un', $username)->first();

    if (!$user) {
        return redirect()->route('login')->with('error', 'User tidak ditemukan.');
    }

    // Ambil case milik branch yang sama + status untuk engineer
    $cases = Service::where('branch_id', $user->branch_id)
                    ->whereIn('status', ['new', 'repair progress'])
                    ->orderBy('created_at', 'DESC')
                    ->get();

    return view('ce.engineer', compact('cases'));
}


public function updateStatus(Request $request, $id)
{
    $case = Service::findOrFail($id);

    // hanya engineer boleh update
   if (session('role') !== 'CE') {
    return back()->with('error', 'Unauthorized');
}


    // validasi status yang diijinkan
    $allowedStatus = [
        'NEW' => ['PROGRESS'],
        'PROGRESS' => ['FINISHED'],
        'FINISHED' => ['CLOSED'],
    ];

    $current = $case->status;
    $new = $request->status;

    if (!isset($allowedStatus[$current]) || !in_array($new, $allowedStatus[$current])) {
        return back()->with('error', 'Invalid Status Transition!');
    }

    $case->update([
        'status' => $new
    ]);

    return back()->with('success', 'Status updated to ' . $new);
}



    // =======================
    // Set status PROGRESS
    // =======================
    public function setProgress($id)
    {
        $case = Service::findOrFail($id);
        $case->status = 'PROGRESS';
        $case->save();

        return back()->with('success', 'Status diubah ke PROGRESS');
    }

    // =======================
    // Set status FINISHED
    // =======================
    public function setFinished($id)
    {
        $case = Service::findOrFail($id);
        $case->status = 'FINISHED';
        $case->save();

        return redirect()->route('ce.finished.index')->with('success', 'Case berhasil diselesaikan.');
    }

    // =======================
    // Halaman Finished
    // =======================
    public function finishedIndex()
    {
        $cases = Service::where('status', 'FINISHED')->get();

        return view('ce.finish', compact('cases'));
    }

    // =======================
    // Close Case
    // =======================
    public function setClosed($id)
    {
        $case = Service::findOrFail($id);
        $case->status = 'CLOSED';
        $case->save();

        return back()->with('success', 'Case berhasil di-close');
    }
}

