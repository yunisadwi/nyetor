<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all(); // Mengambil semua testimonial
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi hanya untuk file gambar
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file gambar
        $image = $request->file('image')->store('testimonial', 'public');

        // Buat testimonial dengan hanya menyimpan path gambar
        Testimonial::create(['image' => $image]);

        return redirect()->route('admin.testimonials.index')->with([
            'message' => 'Testimoni berhasil ditambahkan',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Hapus file gambar dari storage
        File::delete('storage/' . $testimonial->image);
        $testimonial->delete();

        return redirect()->back()->with([
            'message' => 'Testimoni berhasil dihapus',
            'alert-type' => 'danger',
        ]);
    }
}
