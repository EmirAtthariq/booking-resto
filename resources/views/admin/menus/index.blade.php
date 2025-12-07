<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">Menu List</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">

        {{-- ADD MENU BUTTON --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.menus.create') }}"
                class="px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                + Add Menu
            </a>
        </div>
        
        {{-- FILTER + SORT --}}
        <form method="GET" class="mb-6 flex gap-4">

            {{-- Filter kategori --}}
            <select name="category_id"
                class="bg-[#3A2A1F] text-amber-100 px-4 py-2 rounded-lg border border-[#6B4B32]">
                <option value="">All Categories</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            {{-- Sorting --}}
            <select name="sort"
                class="bg-[#3A2A1F] text-amber-100 px-4 py-2 rounded-lg border border-[#6B4B32]">
                <option value="">Sort By</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                    Harga Termurah
                </option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                    Harga Termahal
                </option>
            </select>

            <button class="px-4 py-2 bg-amber-700 text-white rounded-lg hover:bg-amber-800">
                Apply
            </button>
        </form>

        {{-- Pesan jika filter dipilih tetapi hasilnya kosong --}}
        @if (request('category_id') && $groupedMenus->flatten()->isEmpty())
        @php
            $selectedCategory = $categories->firstWhere('id', request('category_id'));
        @endphp

        <div class="bg-red-900/40 border border-red-600 text-red-300 px-4 py-3 rounded-lg mb-6">
            Tidak ada menu dengan kategori:
            <span class="font-bold">"{{ $selectedCategory->name }}"</span>
        </div>
        @endif


        {{-- LIST MENU PER KATEGORI --}}
        @foreach ($groupedMenus as $categoryName => $menus)
        <div class="mb-10">

            <h3 class="text-xl font-semibold text-amber-300 mb-4 border-b border-[#6B4B32] pb-2">
                {{ $categoryName }}
            </h3>

            @if ($menus->isEmpty())
                <p class="text-amber-200 italic">Tidak ada menu untuk kategori ini.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($menus as $menu)
                        <div class="bg-[#3A2A1F] p-4 rounded-xl border border-[#6B4B32] shadow-lg">

                            {{-- Image --}}
                            <img src="{{ Storage::url($menu->image) }}"
                                class="w-full h-40 object-cover rounded-lg mb-3">

                            <h4 class="text-lg font-bold text-amber-200">{{ $menu->name }}</h4>
                            <p class="text-amber-100 text-sm mb-2">{{ $menu->description }}</p>

                            <p class="text-amber-300 font-bold">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </p>

                            <div class="flex justify-between mt-3">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                    class="text-amber-300 hover:text-amber-400">Edit</a>

                                <form method="POST" action="{{ route('admin.menus.destroy', $menu->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 hover:text-red-500">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
        @endforeach


    </div>
</x-admin-layout>
