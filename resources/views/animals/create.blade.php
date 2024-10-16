<x-layout>
    <form action="{{ route('animals.store')}}" method="post">
        @csrf
        <div>
            <x-input-label name="name">Name</x-input-label>
            <x-text-input name="name" id="name"></x-text-input>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <x-input-label for="species">Species</x-input-label>
            <x-text-input name="species" id="species"></x-text-input>
        </div>

        <div>
            <x-input-label for="image_url">Image URL:</x-input-label>
            <x-text-input type="text" name="image_url" id="image_url" placeholder="Enter the image URL"></x-text-input>
        </div>

        <div>
            <x-input-label for="adoption_status">Adoption status</x-input-label>
            <x-text-input name="adoption_status" id="adoption_status"></x-text-input>
        </div>
        <x-primary-button type="submit">Add animal to list</x-primary-button>
    </form>

</x-layout>
