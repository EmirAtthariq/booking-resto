<x-guest-layout>
    <div class="container w-full px-5 py-10 mx-auto bg-[#FFF7E8] min-h-screen flex items-center justify-center">
        <div class="flex-1 max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            
            <!-- Left image -->
            <div class="md:w-1/2 h-64 md:h-auto">
                <img class="w-full h-full object-cover"
                    src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="Reservation Image" />
            </div>

            <!-- Form -->
            <div class="md:w-1/2 p-8 sm:p-12 flex flex-col justify-center">
                <h3 class="mb-6 text-2xl font-bold text-[#4A3F35]">Make Reservation</h3>

                <!-- Step Indicator -->
                <div class="w-full bg-gray-200 rounded-full mb-6">
                    <div class="w-2/4 p-1 text-xs font-medium text-center text-white bg-green-600 rounded-full">
                        Step 2
                    </div>
                </div>

                <form method="POST" action="{{ route('reservations.store.step.two') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="table_id" class="block text-sm font-medium text-[#4A3F35]">Select Table</label>
                            <select id="table_id" name="table_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>
                                        {{ $table->name }} ({{ $table->guest_number }} Guests)
                                    </option>
                                @endforeach
                            </select>
                            @error('table_id')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('reservations.step.one') }}"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium">
                            Previous
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium">
                            Make Reservation
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
