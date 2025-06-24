<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Showroom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-4 font-bold text-xl border-b">🏁 Showroom Admin</div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li><a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">📊
                            Dashboard</a></li>
                    <li><a href="{{ route('admin.carmodels.index') }}"
                            class="block px-3 py-2 rounded hover:bg-gray-100">🚗 Car Models</a></li>
                    <li><a href="{{ route('admin.carvariants.index') }}"
                            class="block px-3 py-2 rounded hover:bg-gray-100">🚘 Car Variants</a></li>
                    <li><a href="{{ route('admin.orders.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">🧾
                            Orders</a></li>
                    <li><a href="{{ route('admin.accessories.index') }}"
                            class="block px-3 py-2 rounded hover:bg-gray-100">🛠 Accessories</a></li>
                    <li><a href="{{ route('admin.products.index') }}"
                            class="block px-3 py-2 rounded hover:bg-gray-100">📦 All Products</a></li>
                    <li><a href="{{ route('admin.blogs.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">📝
                            Blogs</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">👤
                            Users</a></li>
                    {{-- Add more links here --}}
                </ul>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Topbar --}}
            <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
                <div class="font-semibold text-lg">📁 Admin Dashboard</div>
                <div>
                    <span class="mr-2">Xin chào, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Đăng xuất</button>
                    </form>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>