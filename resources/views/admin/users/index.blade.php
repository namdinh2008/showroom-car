@extends('admin.layouts.app')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="bg-white p-6 rounded shadow mx-6 my-6">
        {{-- Tiêu đề --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                👤 DANH SÁCH NGƯỜI DÙNG
            </h1>
        </div>

        {{-- Bảng dữ liệu --}}
        <div class="overflow-x-auto">
            <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-4 py-3 border-b">#</th>
                        <th class="px-4 py-3 border-b">Tên</th>
                        <th class="px-4 py-3 border-b">Email</th>
                        <th class="px-4 py-3 border-b">Số điện thoại</th>
                        <th class="px-4 py-3 border-b text-center">Quyền</th>
                        <th class="px-4 py-3 border-b text-center">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @forelse ($users as $user)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-3 align-middle">{{ $user->id }}</td>
                            <td class="px-4 py-3 align-middle">{{ $user->name }}</td>
                            <td class="px-4 py-3 align-middle">{{ $user->email ?? '-' }}</td>
                            <td class="px-4 py-3 align-middle">{{ $user->phone ?? '-' }}</td>
                            <td class="px-4 py-3 text-center align-middle">
                                @if ($user->role === 'admin')
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold bg-indigo-100 text-indigo-700 rounded">Admin</span>
                                @else
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-700 rounded">User</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center align-middle">
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Không có người dùng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection