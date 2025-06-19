@extends('layouts.admin')

@section('title', 'Configuration Options')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            ⚙️ CONFIGURATION OPTIONS
        </h1>
        <a href="{{ route('admin.caroptions.create') }}">
            <button type="button"
                class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                Add New
            </button>
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Car Model</th>
                    <th class="px-4 py-3 border-b">Option Type</th>
                    <th class="px-4 py-3 border-b">Name</th>
                    <th class="px-4 py-3 border-b text-right">Price Adjustment</th>
                    <th class="px-4 py-3 border-b text-center">Image</th>
                    <th class="px-4 py-3 border-b text-center w-60">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($options as $option)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 align-middle">{{ $option->id }}</td>
                        <td class="px-4 py-3 align-middle">{{ $option->carModel->name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $option->option_type }}</td>
                        <td class="px-4 py-3 align-middle">{{ $option->name }}</td>
                        <td class="px-4 py-3 text-right align-middle">${{ number_format($option->price_adjustment, 0) }}</td>
                        <td class="px-4 py-3 text-center align-middle">
                            @if ($option->image_url)
                                <img src="{{ $option->image_url }}" alt="Option Image" class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center align-middle">
                            <div class="flex justify-center gap-3">
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.caroptions.edit', $option) }}">
                                    <button type="button"
                                        class="px-4 py-1 text-sm font-medium bg-blue-500 rounded-md hover:bg-blue-600 transition shadow">
                                        Edit
                                    </button>
                                </a>

                                {{-- Delete Button --}}
                                <form method="POST" action="{{ route('admin.caroptions.destroy', $option) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this option?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-1 text-sm font-medium bg-red-500 rounded-md hover:bg-red-600 transition shadow">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No configuration options found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection