<x-layout>
    <x-slot:heading>
        Add your pet
    </x-slot:heading>

    <form action="{{ route('animals.store')}}" method="post">
        @csrf
        <div>
            <x-input-label name="name">Name</x-input-label>
            <x-text-input name="name" id="name" placeholder="Enter your pet's name"></x-text-input>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter your pet's description"></textarea>
        </div>

        <div>
            <x-input-label for="species">Species</x-input-label>
            <x-text-input type="radio" name="species" id="dog" value="Dog"></x-text-input>
            <x-input-label for="Dog">Dog</x-input-label>

            <x-text-input type="radio" name="species" id="cat" value="Cat">Cat</x-text-input>
            <x-input-label for="Cat">Cat</x-input-label>

            <x-text-input type="radio" name="species" id="rodent" value="Rodent">Rodent</x-text-input>
            <x-input-label for="Rodent">Rodent</x-input-label>

            <x-text-input type="radio" name="species" id="bird" value="Bird">Bird</x-text-input>
            <x-input-label for="Bird">Bird</x-input-label>

            <x-text-input type="radio" name="species" id="fish" value="Fish">Fish</x-text-input>
            <x-input-label for="Fish">Fish</x-input-label>

            <x-text-input type="radio" name="species" id="reptile" value="Reptile">Reptile</x-text-input>
            <x-input-label for="Reptile">Reptile</x-input-label>

            <x-text-input type="radio" name="species" id="amphibian" value="Amphibian">Amphibian</x-text-input>
            <x-input-label for="Amphibian">Amphibian</x-input-label>

            <x-text-input type="radio" name="species" id="exotic" value="Exotic">Exotic</x-text-input>
            <x-input-label for="Exotic">Exotic</x-input-label>


        </div>

        <div>
            <x-input-label for="image_url">Image URL:</x-input-label>
            <x-text-input type="text" name="image_url" id="image_url"
                          placeholder="Enter the image address"></x-text-input>
        </div>

        <div>
            <x-input-label for="adoption_status">Adoption status</x-input-label>

            <x-text-input type="radio" name="adoption_status" id="for_adoption" value="For adoption"></x-text-input>
            <x-input-label for="For adoption">For adoption</x-input-label>

            <x-text-input type="radio" name="adoption_status" id="reserved" value="Reserved"></x-text-input>
            <x-input-label for="Reserved">Reserved</x-input-label>
        </div>

        <div>
            <x-input-label for="age">Age</x-input-label>
            <x-text-input type="number" name="age" id="age"></x-text-input>
        </div>


        <x-input-label for="gender">Gender</x-input-label>

        <x-text-input type="radio" name="gender" id="male" value="Male"></x-text-input>
        <x-input-label for="Male">Male</x-input-label>

        <x-text-input type="radio" name="gender" id="female" value="Female"></x-text-input>
        <x-input-label for="Female">Female</x-input-label>

        <x-text-input type="radio" name="gender" id="unknown" value="Unknown"></x-text-input>
        <x-input-label for="Unknown">Unknown</x-input-label>

        <div>
            <x-input-label name="address">Address</x-input-label>
            <x-text-input name="address" id="address" placeholder="Enter your pet's/your address"></x-text-input>
        </div>

        <x-primary-button type="submit">Add animal to list</x-primary-button>
    </form>

</x-layout>
