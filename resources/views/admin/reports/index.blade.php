@extends('layouts.admin')
@section('title', 'Báo cáo doanh thu')
@section('content')
<div class="bg-white p-8 rounded shadow max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Báo cáo doanh thu</h1>
    <form method="GET" class="mb-6 flex gap-4 flex-wrap">
        <div>
            <label class="block text-sm font-semibold">Từ ngày</label>
            <input type="date" name="from" value="{{ request('from') }}" class="border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-semibold">Đến ngày</label>
            <input type="date" name="to" value="{{ request('to') }}" class="border rounded px-3 py-2">
        </div>
        <div class="flex items-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Lọc</button>
        </div>
    </form>
    <table class="table-auto w-full border mb-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Ngày</th>
                <th class="px-4 py-2">Tổng đơn ô tô</th>
                <th class="px-4 py-2">Tổng đơn phụ kiện</th>
                <th class="px-4 py-2">Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
                <tr>
                    <td class="px-4 py-2">{{ $report['date'] }}</td>
                    <td class="px-4 py-2">{{ $report['car_orders'] }}</td>
                    <td class="px-4 py-2">{{ $report['accessory_orders'] }}</td>
                    <td class="px-4 py-2">{{ number_format($report['revenue']) }}₫</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4">Không có dữ liệu.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
