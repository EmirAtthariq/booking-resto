<x-admin-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto">

            <!-- Back Button -->
            <a href="{{ route('admin.categories.index') }}"
                class="inline-flex items-center px-4 py-2 mb-6 text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                ← Back to Categories
            </a>

            <!-- Card -->
            <div class="bg-gray-900 border border-gray-800 shadow-xl rounded-2xl p-8">
                <h2 class="text-2xl font-bold mb-6 text-indigo-400">Create New Category</h2>

                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="text-sm font-semibold text-gray-300">Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-200 px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="text-sm font-semibold text-gray-300">Image</label>
                        <input type="file" id="image" name="image"
                            class="mt-2 w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-200 px-4 py-2 file:bg-gray-700 file:border-none file:px-4 file:py-2 file:rounded-lg file:text-gray-200 file:hover:bg-gray-600">
                        @error('image')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="text-sm font-semibold text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="mt-1 w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-200 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
