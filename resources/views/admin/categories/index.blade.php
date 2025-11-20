<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Categories
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Add Category Button -->
            <div class="flex justify-end">
                <a href="{{ route('admin.categories.create') }}"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                    + Add Category
                </a>
            </div>

            <!-- Category List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($categories as $category)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">

                        <!-- Image -->
                        <img src="{{ Storage::url($category->image) }}"
                            class="w-full h-40 object-cover">

                        <div class="p-5 space-y-3">

                            <!-- Name -->
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $category->name }}
                            </h3>

                            <!-- Description -->
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-3">
                                {{ $category->description }}
                            </p>

                            <!-- Actions -->
                            <div class="flex items-center gap-3 pt-3">

                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="flex-1 text-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
                                    class="flex-1"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="w-full px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                @empty
                    <div class="col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">
                        No categories found.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-admin-layout>
