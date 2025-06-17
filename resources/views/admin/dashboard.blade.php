@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Admin Dashboard
        </h1>

        <p class="text-gray-700 dark:text-gray-300">
            Xin chào, <strong>{{ Auth::user()->name }}</strong>!
        </p>

        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
            Bạn đang đăng nhập với quyền <code>admin</code>. Đây là trang admin hệ thống showroom.
        </p>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Trở về Dashboard
            </a>
        </div>
    </div>
</div>
@endsection