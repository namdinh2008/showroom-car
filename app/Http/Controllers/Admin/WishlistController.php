<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Wishlist::with(['user', 'product']);

        if ($search) {
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $wishlists = $query->paginate(10);
        return view('admin.wishlists.index', compact('wishlists', 'search'));
    }

    public function destroy($id)
    {
        Wishlist::findOrFail($id)->delete();
        return redirect('/admin/wishlists')->with('success', 'Xóa mục yêu thích thành công!');
    }
}