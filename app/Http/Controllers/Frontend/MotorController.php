<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Motor;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        // Filter data motor berdasarkan status aktif
        $motors = Motor::where('status', 1);

        $motors = $motors->get(); // Eksekusi query
        return view('frontend.motor.index', compact('motors')); // Update nama view jika diperlukan
    }

    public function show(Motor $motor) // Ubah tipe parameter menjadi Motor
    {
        return view('frontend.motor.show', compact('motor')); // Update nama view jika diperlukan
    }

    public function store(BookingRequest $request)
    {
        // Membuat booking baru berdasarkan data yang tervalidasi
        Booking::create($request->validated());

        return redirect()->back()->with([
            'message' => 'Kami akan menghubungi anda secepatnya!',
            'alert-type' => 'success'
        ]);
    }
}
