<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Edit Table
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Back -->
            <a href="{{ route('admin.tables.index') }}"
               class="inline-block mb-6 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
               ← Back to Tables
            </a>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

                <form method="POST" action="{{ route('admin.tables.update', $table->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-300">Table Name</label>
                        <input type="text" name="name" value="{{ $table->name }}"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Guest Number -->
                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-300">Guest Capacity</label>
                        <input type="number" name="guest_number" value="{{ $table->guest_number }}"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2">
                        @error('guest_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status"
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2">
                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-300">Location</label>
                        <select name="location"
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2">
                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow font-semibold">
                        Update
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
