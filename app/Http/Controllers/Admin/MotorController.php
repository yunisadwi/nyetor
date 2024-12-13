<?php

namespace App\Http\Controllers\Admin;

use App\Models\Motor;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\MotorRequest;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motor::get();

        return view('admin.motors.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Motor::statuses();
        $types = Type::get(['id', 'nama']);

        return view('admin.motors.create', compact('statuses', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotorRequest $request)
{
    if ($request->validated()) {
        // Ambil nama asli file gambar
        $imageName = $request->file('image')->getClientOriginalName();

        // Pindahkan file gambar ke folder public/frontend/images
        $request->file('image')->move(public_path('frontend/images'), $imageName);

        // Buat slug dari nama motor
        $slug = Str::slug($request->nama_motor, '-');

        // Simpan data motor ke dalam database, termasuk path gambar
        Motor::create($request->except('image') + ['image' => 'frontend/images/' . $imageName, 'slug' => $slug]);
    }

    return redirect()->route('admin.motors.index')->with([
        'message' => 'Motor berhasil dibuat!',
        'alert-type' => 'success',
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        $statuses = Motor::statuses();
        $types = Type::get(['id', 'nama']);

        return view('admin.motors.edit', compact('motor', 'types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotorRequest $request, Motor $motor)
{
    if ($request->validated()) {
        $slug = Str::slug($request->nama_motor, '-');

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            File::delete(public_path($motor->image));

            // Pindahkan gambar baru ke folder public/frontend/images
            $imageName = $request->file('image')->getClientOriginalName(); // Nama asli file
            $request->file('image')->move(public_path('frontend/images'), $imageName); // Pindahkan gambar

            // Update data motor dengan gambar baru
            $motor->update($request->except('image') + ['image' => 'frontend/images/' . $imageName, 'slug' => $slug]);
        } else {
            // Jika gambar tidak diupload, cukup update data motor tanpa mengganti gambar
            $motor->update($request->except('image') + ['slug' => $slug]);
        }
    }

    return redirect()->route('admin.motors.index')->with([
        'message' => 'Motor berhasil diperbarui!',
        'alert-type' => 'info',
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        File::delete('storage/' . $motor->image);
        $motor->delete();

        return redirect()->back()->with([
            'message' => 'Berhasil dihapus',
            'alert-type' => 'danger',
        ]);
    }
}
