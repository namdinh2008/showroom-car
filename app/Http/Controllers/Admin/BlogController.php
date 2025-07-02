<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Blog::query();

        if ($search) {
            $query->where('title', 'like', "%$search%");
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs', 'search'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'content']);
        $data['admin_id'] = Auth::id();
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        // Upload ảnh nếu có
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('uploads/blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Đăng bài viết thành công!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'content']);
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        // Nếu có upload ảnh mới thì xoá ảnh cũ rồi lưu ảnh mới
        if ($request->hasFile('image_path')) {
            if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                Storage::disk('public')->delete($blog->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('uploads/blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Xoá ảnh nếu có
        if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
            Storage::disk('public')->delete($blog->image_path);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Xóa bài viết thành công!');
    }
}