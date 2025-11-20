<x-guest-layout>
    <div class="w-full min-h-screen px-6 py-10 mx-auto bg-[#FFF7E8]">

        <h2 class="text-4xl font-bold text-center text-[#4A3F35] mb-10 tracking-wide">
            Explore Our Categories
        </h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 place-items-center">
            @foreach ($categories as $category)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 w-64">
                    <div class="overflow-hidden rounded-t-2xl">
                        <img class="w-full h-48 object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" />
                    </div>

                    <div class="px-6 py-4 text-center">
                        <h4 class="text-2xl font-semibold text-[#4A3F35] hover:text-[#2F4F3A] transition-colors duration-300 uppercase tracking-wide">
                            {{ $category->name }}
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-guest-layout>
