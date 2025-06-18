<nav class="flex justify-between items-center p-4 fixed w-full bg-white bg-opacity-80 z-50 shadow">
    <div class="text-xl font-bold">
        <a href="/">SHOWROOM</a>
    </div>
    <ul class="hidden md:flex gap-6">
        <li><a href="/" class="hover:underline">Trang chủ</a></li>
        <li><a href="/carmodels" class="hover:underline">Ô tô</a></li>
        <li><a href="/accessories" class="hover:underline">Shop phụ kiện</a></li>
        <li><a href="/carorders/create" class="hover:underline">Đặt xe</a></li>
        @auth
            <li><a href="/orders" class="hover:underline">Lịch sử đơn hàng</a></li>
        @endauth
    </ul>
    <div class="hidden md:flex gap-4 items-center">
        @auth
            <a href="/profile/edit" class="hover:underline">Tài khoản</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Đăng xuất</button>
            </form>
        @else
            <a href="/login" class="hover:underline">Đăng nhập</a>
            <a href="/register" class="hover:underline">Đăng ký</a>
        @endauth
    </div>
</nav>
