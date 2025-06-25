<?php

namespace App\Http\Controllers\User;

use App\Models\CarModel;
use App\Models\Accessory;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarVariant;

class HomeController extends Controller
{
    public function index()
    {
        $carModels = CarModel::where('is_active', true)->get();
        $accessories = Accessory::with('product')->where('is_active', 1)->take(4)->get();
        $blogs = Blog::latest()->take(4)->get();

        $featuredCars = CarVariant::with('product')->where('is_active', 1)->take(4)->get();

        return view('user.home', compact('carModels', 'accessories', 'blogs', 'featuredCars'));
    }
}
