{{--//de aangemaakte dieren--}}

@props(['animal'])
<x-slot:heading>
    Find your new best buddy here!
</x-slot:heading>


<div class="animal-card">
    <h2>Name: {{ $animal->name }}</h2>
    <p>Description: {{ $animal->description }}</p>
    <h3>Species: {{ $animal->species }}</h3>
    <h3>Age: {{ $animal->age }}</h3>
    <h3>Gender: {{ $animal->gender }}</h3>
    <h3>Address: {{ $animal->address }}</h3>



@if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" width="200">
    @else
        <p>No image available</p>
    @endif

    <!-- Link to details page using Laravel routing -->
    <a href="{{ route('animals.show', $animal->id) }}">Details</a>
</div>
