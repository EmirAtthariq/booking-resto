<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Tables
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Add Button -->
            <div class="flex justify-end">
                <a href="{{ route('admin.tables.create') }}"
                   class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                    + New Table
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($tables as $table)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 space-y-4">

                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $table->name }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">Guests:</span> {{ $table->guest_number }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">Status:</span> {{ $table->status->name }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">Location:</span> {{ $table->location->name }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-3">
                            <a href="{{ route('admin.tables.edit', $table->id) }}"
                               class="flex-1 text-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                                Edit
                            </a>

                            <form action="{{ route('admin.tables.destroy', $table->id) }}" method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-full px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">
                        No tables available.
                    </p>
                @endforelse

            </div>

        </div>
    </div>
</x-admin-layout>
