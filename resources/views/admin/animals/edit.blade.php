<x-layout>
    <x-slot:heading>
        Edit your pet
    </x-slot:heading>

    <form action="{{ route('admin.animals.update', $animal) }}" method="post" class="space-y-6 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-lg mx-auto">
        @csrf
        @method('PATCH')

        <!-- naam veld -->
        <div>
            <x-input-label for="name">🐾 Name</x-input-label>
            <x-text-input name="name" id="name" placeholder="Enter your pet's name" value="{{ old('name', $animal->name) }}"/>
            {{--            toon de oude waarde als die bestaat en als er geen oude waarde is toon dan de huidige waarde uit de database--}}
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- omschrijving veld -->
        <div>
            <x-input-label for="description">📝 Description</x-input-label>
            <textarea name="description" id="description" placeholder="Enter your pet's description"
                      class="border p-2 w-full">{{ old('description', $animal->description) }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- species veld -->
        <div>
            <x-input-label>🐶 Species</x-input-label>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['Dog', 'Cat', 'Rodent', 'Bird', 'Fish', 'Reptile', 'Amphibian', 'Exotic'] as $specie)
                    <div class="flex items-center gap-2">
                        <x-text-input type="radio" name="species" id="{{ strtolower($specie) }}" value="{{ $specie }}" :checked="old('species', $animal->species) === $specie"/>
                        {{-- :checked="old('species') === 'Dog'" is een boolean en wordt gechecked of het gecheckt is, als het waar is word de checkbox op true gezet en dus gecheckt --}}
                        <x-input-label for="{{ strtolower($specie) }}">{{ $specie }}</x-input-label>
                        {{-- strtolower zodat de species naam word omgezet naar een lowercase zodat het matcht met de id (omdat elke input met een hoofdletter is) --}}
                    </div>
                @endforeach
            </div>
            @error('species') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- image url veld -->
        <div>
            <x-input-label for="image_url">📷 Image URL</x-input-label>
            <x-text-input name="image_url" id="image_url" placeholder="Enter the image address"
                          value="{{ old('image_url', $animal->image_url) }}"/>
            @error('image_url') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- adoption status veld-->
        <div>
            <x-input-label>🏡 Adoption Status</x-input-label>
            <div class="flex gap-3">
                <x-text-input type="radio" name="adoption_status" id="for_adoption" value="For adoption"
                              :checked="old('adoption_status', $animal->adoption_status) === 'For adoption'"/>
                <x-input-label for="for_adoption">For adoption</x-input-label>
                <x-text-input type="radio" name="adoption_status" id="reserved" value="Reserved"
                              :checked="old('adoption_status', $animal->adoption_status) === 'Reserved'"/>
                <x-input-label for="reserved">Reserved</x-input-label>
            </div>
            @error('adoption_status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- age veld-->
        <div>
            <x-input-label for="age">📅 Age</x-input-label>
            <x-text-input type="number" name="age" id="age" value="{{ old('age', $animal->age) }}" min="0" max="190"/>
            @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- gender veld -->
        <div>
            <x-input-label>♂️♀️ Gender</x-input-label>
            <div class="flex gap-3">
                @foreach(['Male', 'Female', 'Unknown'] as $gender)
                    <x-text-input type="radio" name="gender" id="{{ strtolower($gender) }}" value="{{ $gender }}"
                                  :checked="old('gender', $animal->gender) === $gender"/>
                    <x-input-label for="{{ strtolower($gender) }}">{{ $gender }}</x-input-label>
                    {{-- strtolower zodat de gender naam word omgezet naar een lowercase zodat het matcht met de id (omdat elke input met een hoofdletter is) --}}
                @endforeach
            </div>
            @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- adres veld -->
        <div>
            <x-input-label for="address">🏠 Address</x-input-label>
            <x-text-input name="address" id="address" placeholder="Enter your address" value="{{ old('address', $animal->address) }}"/>
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- create knop -->
        <x-anchor-link href="{{ route('admin.animals.index') }}">Cancel</x-anchor-link>
        <x-primary-button type="submit">Save</x-primary-button>
    </form>
</x-layout>
