<x-guest-layout>
    <div class="container w-full px-6 py-14 mx-auto">

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10">

            @foreach ($categories as $category)
                <div class="rounded-2xl overflow-hidden bg-white border border-[#E8DCC0]
                            shadow-md hover:shadow-xl hover:-translate-y-2 transition duration-300">

                    <img class="w-full h-48 object-cover"
                        src="{{ Storage::url($category->image) }}" alt="Category Image">

                    <div class="px-6 py-5">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <h4 class="mb-2 text-xl font-bold uppercase tracking-wide
                                    text-[#4A3F35] hover:text-[#C9A35A] transition">
                                {{ $category->name }}
                            </h4>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>
