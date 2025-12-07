<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">Edit Menu</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Back -->
            <a href="{{ route('admin.menus.index') }}"
               class="inline-block mb-6 px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                ← Back to Menu List
            </a>

            <div class="bg-[#3A2A1F] shadow-xl rounded-xl p-8 border border-[#6B4B32]">

                <form method="POST"
                      action="{{ route('admin.menus.update', $menu->id) }}"
                      class="space-y-6" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', $menu->name) }}"
                               class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 px-3 py-2 font-semibold">
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Price</label>
                        <input type="number" name="price"
                               value="{{ old('price', $menu->price) }}"
                               class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 px-3 py-2 font-semibold">
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Category</label>
                        <select name="category_id"
                                class="mt-1 w-full rounded-lg p-2 bg-[#4A3520] text-amber-100">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->parent->name }} - {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Current Image</label>
                        <img src="{{ Storage::url($menu->image) }}"
                             class="w-32 h-32 rounded-lg mb-2 border border-[#6B4B32]">

                        <input type="file" name="image"
                               class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 px-3 py-2">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Description</label>
                        <textarea name="description" rows="3"
                                  class="w-full mt-1 rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 px-3 py-2">{{ old('description', $menu->description) }}</textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg font-semibold shadow-lg">
                        Update
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
