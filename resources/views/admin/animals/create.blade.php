<x-layout>
    <x-slot:heading>
        Add your pet
    </x-slot:heading>

    <form action="{{ route('admin.animals.store') }}" method="post" class="space-y-6 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-lg mx-auto">
        @csrf

        <!-- naam veld -->
        <div>
            <x-input-label for="name">🐾 Name</x-input-label>
            <x-text-input name="name" id="name" placeholder="Enter your pet's name" value="{{ old('name') }}"/>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- omschrijving veld -->
        <div>
            <x-input-label for="description">📝 Description</x-input-label>
            <textarea name="description" id="description" placeholder="Enter your pet's description"
                      class="border p-2 w-full">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- species veld -->
        <div>
            <x-input-label for="species_id">🐶 Species</x-input-label>
            <select name="species_id" id="species_id" required class="border border-gray-300 rounded p-2 w-full">
                @foreach ($species as $specie)
                    <option value="{{ $specie->id }}" {{ old('species_id') == $specie->id ? 'selected' : '' }}>
                        {{ $specie->species }}
                    </option>
                @endforeach
            </select>
            @error('species_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- image url veld -->
        <div>
            <x-input-label for="image_url">📷 Image URL</x-input-label>
            <x-text-input name="image_url" id="image_url" placeholder="Enter the image address"
                          value="{{ old('image_url') }}"/>
            @error('image_url') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- adoption status veld-->
        <div>
            <x-input-label>🏡 Adoption Status</x-input-label>
            <div class="flex gap-3">
                <x-text-input type="radio" name="adoption_status" id="for_adoption" value="For adoption"
                              :checked="old('adoption_status') === 'For adoption'"/>
                <x-input-label for="for_adoption">For adoption</x-input-label>
                <x-text-input type="radio" name="adoption_status" id="reserved" value="Reserved"
                              :checked="old('adoption_status') === 'Reserved'"/>
                <x-input-label for="reserved">Reserved</x-input-label>
            </div>
            @error('adoption_status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- age veld-->
        <div>
            <x-input-label for="age">📅 Age</x-input-label>
            <x-text-input type="number" name="age" id="age" value="{{ old('age') }}" min="0" max="190"/>
            @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- gender veld -->
        <div>
            <x-input-label>♂️♀️ Gender</x-input-label>
            <div class="flex gap-3">
                @foreach(['Male', 'Female', 'Unknown'] as $gender)
                    <x-text-input type="radio" name="gender" id="{{ strtolower($gender) }}" value="{{ $gender }}"
                                  :checked="old('gender') === $gender"/>
                    <x-input-label for="{{ strtolower($gender) }}">{{ $gender }}</x-input-label>
                @endforeach
            </div>
            @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- adres veld -->
        <div>
            <x-input-label for="address">🏠 Address</x-input-label>
            <x-text-input name="address" id="address" placeholder="Enter your address" value="{{ old('address') }}"/>
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- create knop -->
        <x-primary-button type="submit">Add pet to list</x-primary-button>
    </form>
</x-layout>
