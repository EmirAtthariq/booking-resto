<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">Edit Category</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Back -->
            <a href="{{ route('admin.categories.index') }}"
                class="inline-block mb-6 px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                ← Back to Category List
            </a>

            <div class="bg-[#3A2A1F] shadow-xl rounded-xl p-8 border border-[#6B4B32]">

                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Name</label>
                        <input type="text" name="name"
                            value="{{ $category->name }}"
                            class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 px-3 py-2 font-semibold">
                    </div>

                    <!-- Parent -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Parent (optional)</label>
                        <select name="parent_id"
                            class="mt-1 w-full rounded-lg p-2 bg-[#4A3520] text-amber-100">

                            <option value="">-- None --</option>

                            @foreach ($parents as $p)
                                <option value="{{ $p->id }}"
                                    {{ $category->parent_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit"
                        class="w-full py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg font-semibold shadow-lg">
                        Update
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
