<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg flex flex-col px-4 py-6">
            <h1 class="text-2xl font-bold text-red-600 mb-6 flex items-center gap-2">
                🚗 Showroom Admin
            </h1>

            <nav class="flex-1">
                <ul class="space-y-2 text-sm font-medium">
                    <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-bold' : '' }}">📊 Dashboard</a></li>
                    <li><a href="{{ route('admin.carmodels.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">🚙 Quản lý mẫu xe</a></li>
                    <li><a href="{{ route('admin.carconfigurationoptions.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">⚙️ Tuỳ chọn cấu hình</a></li>
                    <li><a href="{{ route('admin.carorders.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">📦 Đơn đặt xe</a></li>
                    <li><a href="{{ route('admin.accessories.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">🧰 Phụ kiện</a></li>
                    <li><a href="{{ route('admin.orders.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">🧾 Đơn hàng phụ kiện</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">👤 Người dùng</a></li>
                    <li><a href="{{ route('admin.reports.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">📈 Báo cáo doanh thu</a></li>
                </ul>
            </nav>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:underline">← Về Dashboard User</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">Đăng xuất</button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>