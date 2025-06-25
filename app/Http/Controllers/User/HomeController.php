<?php

namespace App\Http\Controllers\User;

use App\Models\CarModel;
use App\Models\Accessory;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carModels = CarModel::where('is_active', true)->get();
        $accessories = Accessory::where('is_active', true)->take(6)->get();
        $blogs = Blog::latest()->take(3)->get();

        return view('home', compact('carModels', 'accessories', 'blogs'));
    }
}