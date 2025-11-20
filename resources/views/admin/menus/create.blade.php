<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Create Menu
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Back to Menu -->
            <a href="{{ route('admin.menus.index') }}"
               class="inline-block mb-6 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
               ← Back to Menu List
            </a>

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">

                <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-3 py-2">
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Image</label>
                        <input type="file" name="image"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-2">
                        @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Price</label>
                        <input type="number" name="price" step="0.01"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-3 py-2">
                        @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" rows="3"
                                  class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-3 py-2"></textarea>
                        @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Categories -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Categories</label>
                        <select name="categories[]" multiple
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                            class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold shadow">
                        Submit
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
