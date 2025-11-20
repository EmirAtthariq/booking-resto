<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Menus
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Add Menu Button -->
            <div class="flex justify-end">
                <a href="{{ route('admin.menus.create') }}"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                    + Add Menu
                </a>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($menus as $menu)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">

                        <img src="{{ Storage::url($menu->image) }}" class="w-full h-40 object-cover">

                        <div class="p-5 space-y-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $menu->name }}</h3>

                            <p class="text-indigo-600 dark:text-indigo-400 font-bold text-lg">
                                Rp {{ number_format($menu->price, 2, ',', '.') }}
                            </p>

                            <div class="flex items-center gap-3 pt-3">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                   class="flex-1 text-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.menus.destroy', $menu->id) }}"
                                      class="flex-1"
                                      onsubmit="return confirm('Delete this menu?');">
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
                    <p class="text-center text-gray-500 dark:text-gray-400 py-10 col-span-3">
                        No menus found.
                    </p>
                @endforelse
            </div>

        </div>
    </div>
</x-admin-layout>
