<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Motor; // Pastikan model Motor sudah ada
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data booking beserta data motor terkait
        $bookings = Booking::with('motor')->get();

        // Tampilkan halaman dengan data booking
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data motor yang tersedia untuk dipilih
        $motors = Motor::all();

        // Tampilkan form untuk membuat booking baru
        return view('admin.bookings.create', compact('motors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Menentukan aturan validasi
    $validated = $request->validate([
        'motor_id' => 'required|exists:motor,id', // Memastikan motor_id ada di tabel motor
        'nama_lengkap' => 'required|string|max:255', // Validasi field nama_lengkap
        'alamat_lengkap' => 'required|string|max:255', // Validasi field alamat_lengkap
        'nomer_wa' => 'required|string|max:255', // Validasi field nomer_wa
        'tanggal_penyewaan' => 'nullable|date', // Opsional, jika ada, harus berupa tanggal yang valid
        'durasi_sewa' => 'required|integer|min:1', // Pastikan durasi_sewa adalah integer positif
    ]);

    // Jika validasi berhasil, lanjutkan untuk membuat booking
    Booking::create([
        'motor_id' => $request->motor_id,
        'nama_lengkap' => $request->nama_lengkap,
        'alamat_lengkap' => $request->alamat_lengkap,
        'nomer_wa' => $request->nomer_wa,
        'tanggal_penyewaan' => $request->tanggal_penyewaan ?? now()->toDateString(), // Default ke tanggal hari ini jika kosong
        'durasi_sewa' => $request->durasi_sewa,
    ]);

    // Redirect atau beri pesan sukses
    return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dibuat!');
}


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // Tampilkan halaman detail untuk booking yang dipilih
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        // Ambil data motor yang tersedia untuk dipilih
        $motors = Motor::all();

        // Tampilkan form untuk mengedit data booking
        return view('admin.bookings.edit', compact('booking', 'motors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Validasi input
        $request->validate([
            'motor_id' => 'required|exists:motor,id',
            'nama_lengkap' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'nomer_wa' => 'required|string|max:255',
            'tanggal_penyewaan' => 'required|date',
            'durasi_sewa' => 'required|integer|min:1',
        ]);

        // Update data booking di database
        $booking->motor_id = $request->motor_id;
        $booking->nama_lengkap = $request->nama_lengkap;
        $booking->alamat_lengkap = $request->alamat_lengkap;
        $booking->nomer_wa = $request->nomer_wa;
        $booking->tanggal_penyewaan = $request->tanggal_penyewaan;
        $booking->durasi_sewa = $request->durasi_sewa;
        $booking->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.bookings.index')->with([
            'message' => 'Booking berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // Hapus data booking
        $booking->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.bookings.index')->with([
            'message' => 'Booking berhasil dihapus!',
            'alert-type' => 'danger'
        ]);
    }
}
