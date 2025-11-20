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
                <h2 class="text-2xl font-bold mb-6 text-indigo-400">Edit Category</h2>

                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name" class="text-sm font-semibold text-gray-300">Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ $category->name }}"
                            class="mt-1 w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-200 px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">

                        @error('name')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Current Image</label>
                        <div class="mt-2">
                            <img src="{{ Storage::url($category->image) }}" class="w-32 h-32 rounded-lg object-cover border border-gray-700 shadow">
                        </div>

                        <label for="image" class="block mt-4 text-sm font-semibold text-gray-300">Replace Image</label>
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
                            class="mt-1 w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-200 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500">{{ $category->description }}</textarea>

                        @error('description')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
                        Update
