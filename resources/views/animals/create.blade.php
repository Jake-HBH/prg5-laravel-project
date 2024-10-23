<x-layout>
    <x-slot:heading>
        Add your pet
    </x-slot:heading>

    <form action="{{ route('animals.store')}}" method="post" class="flex flex-col gap-4">
        @csrf
        <div>
            <x-input-label name="name">Name</x-input-label>
            <x-text-input
                name="name"
                id="name"
                placeholder="Enter your pet's name"
                value="{{ old('name') }}"
            ></x-text-input>
            @error('name')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter your pet's description">
                {{old('description')}}
            </textarea>
            @error('description')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div>
            <x-input-label for="species">Species</x-input-label>
            <br>
            <div class="flex flex-row gap-4">
                <x-text-input type="radio" name="species" id="dog" value="Dog"
                              :checked="old('species') === 'Dog'" />
                {{--                :checked="old('species') === 'Dog'" is een boolean en wordt gechecked of het gecheckt is, als het waar is word de checkbox op true gezet en dus gecheckt--}}
                <x-input-label for="Dog">Dog</x-input-label>

                <x-text-input type="radio" name="species" id="cat" value="Cat" :checked="old('species') === 'Cat'">Cat
                </x-text-input>
                <x-input-label for="Cat">Cat</x-input-label>

                <x-text-input type="radio" name="species" id="rodent" value="Rodent"
                              :checked="old('species') === 'Rodent'">Rodent
                </x-text-input>
                <x-input-label for="Rodent">Rodent</x-input-label>

                <x-text-input type="radio" name="species" id="bird" value="Bird" :checked="old('species') === 'Bird'">
                    Bird
                </x-text-input>
                <x-input-label for="Bird">Bird</x-input-label>

                <x-text-input type="radio" name="species" id="fish" value="Fish" :checked="old('species') === 'Fish'">
                    Fish
                </x-text-input>
                <x-input-label for="Fish">Fish</x-input-label>

                <x-text-input type="radio" name="species" id="reptile" value="Reptile"
                              :checked="old('species') === 'Reptile'">Reptile
                </x-text-input>
                <x-input-label for="Reptile">Reptile</x-input-label>

                <x-text-input type="radio" name="species" id="amphibian" value="Amphibian"
                              :checked="old('species') === 'Amphibian'">Amphibian
                </x-text-input>
                <x-input-label for="Amphibian">Amphibian</x-input-label>

                <x-text-input type="radio" name="species" id="exotic" value="Exotic"
                              :checked="old('species') === 'Exotic'">Exotic
                </x-text-input>
                <x-input-label for="Exotic">Exotic</x-input-label>

                @error('species')
                <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <x-input-label for="image_url">Image URL:</x-input-label>
            <x-text-input type="text" name="image_url" id="image_url"
                          placeholder="Enter the image address">{{old('image_url')}}
            </x-text-input>
            @error('image_url')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div>
            <x-input-label for="adoption_status">Adoption status</x-input-label>

            <div class="flex flex-row gap-4">

                <x-text-input type="radio" name="adoption_status" id="for_adoption"
                              value="For adoption" :checked="old('adoption_status') === 'For adoption'"></x-text-input>
                <x-input-label for="For adoption">For adoption</x-input-label>

                <x-text-input type="radio" name="adoption_status" id="reserved"
                              value="Reserved" :checked="old('adoption_status') === 'Reserved'">
                </x-text-input>
                <x-input-label for="Reserved">Reserved</x-input-label>
                @error('adoption_status')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <x-input-label for="age">Age</x-input-label>
            <x-text-input type="number" name="age" id="age" value="{{old('age')}}" />
            @error('age')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>


        <x-input-label for="gender">Gender</x-input-label>

        <div class="flex flex-row gap-4">

            <x-text-input type="radio" name="gender" id="male" value="Male"
                          :checked="old('gender') === 'Male'"></x-text-input>
            <x-input-label for="Male">Male</x-input-label>

            <x-text-input type="radio" name="gender" id="female" value="Female"
                          :checked="old('gender') === 'Female'"></x-text-input>
            <x-input-label for="Female">Female</x-input-label>

            <x-text-input type="radio" name="gender" id="unknown" value="Unknown"
                          :checked="old('gender') === 'Unknown'"></x-text-input>
            <x-input-label for="Unknown">Unknown</x-input-label>
            @error('gender')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div>
            <x-input-label name="address">Address</x-input-label>
            <x-text-input name="address" id="address" placeholder="Enter your pet's/your address"></x-text-input>
            @error('address')
            <span>
                {{ $message }}
            </span>
            @enderror
        </div>

        <x-primary-button type="submit">Add animal to list</x-primary-button>
    </form>

</x-layout>
