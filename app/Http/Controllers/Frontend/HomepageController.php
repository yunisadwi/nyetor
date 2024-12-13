<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Motor;
use App\Models\Type;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index(Request $request)
    {

        $motors = Motor::where('status',1)->get();
        $testimonials = Testimonial::get();
        $types = Type::get(['id','nama']);

        return view('frontend.homepage', compact('motors','testimonials','types'));
    }
}
