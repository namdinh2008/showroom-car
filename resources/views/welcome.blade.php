<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Showroom Ô Tô K66</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Showroom K66</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/cars">Ô tô</a></li>
                    <li class="nav-item"><a class="nav-link" href="/accessories">Phụ kiện</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-center py-5">
            <h1 class="display-4 mb-3">Chào mừng đến với Showroom Ô Tô K66</h1>
            <p class="lead mb-4">Khám phá các mẫu xe mới nhất và phụ kiện chính hãng.</p>
            <a href="/cars" class="btn btn-primary btn-lg mx-2">Xem danh sách ô tô</a>
            <a href="/accessories" class="btn btn-outline-secondary btn-lg mx-2">Xem phụ kiện</a>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2025 Showroom K66. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
