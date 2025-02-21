<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        // Fetch active testimonials, limit to 3, and select required columns
        $testimonials = Testimonial::where('is_active', 1)
            ->latest('id')
            ->limit(3)
            ->select(['id', 'client_name', 'client_designation', 'client_message', 'client_image'])
            ->get();

        $categories = Category::where('is_active',1)
            ->select('id', 'name', 'slug','category_image')
            ->get();

        return view('frontend.pages.home', compact('testimonials','categories'));
    }
}
