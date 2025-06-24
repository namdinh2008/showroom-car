<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'image_url' => 'nullable|url',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['admin_id'] = Auth::id();
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Blog::create($validated);

        return redirect('/admin/blogs')->with('success', 'Đăng bài viết thành công!');
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
            'image_url' => 'nullable|url',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        $blog->update($validated);

        return redirect('/admin/blogs')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect('/admin/blogs')->with('success', 'Xóa bài viết thành công!');
    }
}