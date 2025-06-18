<section class="h-screen bg-cover bg-center flex flex-col justify-center items-center text-center relative"
    style="background-image: url('{{ $image ?? ($background ?? 'https://tesla-cdn.thron.com/delivery/public/image/tesla/3ef3ae91-b064-45ce-a9d4-4303df099206/bvlatuR/std/4096x2560/_25-Hero-D') }}');">
    <div class="{{ !empty($whiteText) && $whiteText ? 'text-white' : 'text-black' }} z-10">
        <h1 class="text-4xl md:text-6xl font-semibold mb-2">{{ $title ?? 'Model Y' }}</h1>
        <p class="text-lg md:text-xl mb-6">{{ $subtitle ?? 'Lease starting at $399/mo*' }}</p>
        @empty($hideButtons)
        <div class="flex justify-center gap-4">
            @if(!empty($link))
                <a href="{{ $link }}" class="bg-white text-black px-6 py-2 rounded hover:bg-gray-300">Xem chi tiết</a>
            @else
                <a href="#" class="bg-white text-black px-6 py-2 rounded hover:bg-gray-300">Order Now</a>
            @endif
            <a href="#" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">Demo Drive</a>
        </div>
        @endempty
    </div>
    <div class="absolute bottom-6 w-full {{ !empty($whiteText) && $whiteText ? 'text-white' : 'text-black' }} text-sm">*Excludes taxes and fees</div>
</section>
