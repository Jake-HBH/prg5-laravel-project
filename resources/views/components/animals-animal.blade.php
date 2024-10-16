@props(['animal'])

<div class="animal-card">
    <h2>{{ $animal->name }}</h2>
    <p>{{ $animal->description }}</p>
    <h3>{{ $animal->species }}</h3>


@if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" width="200">
    @else
        <p>No image available</p>
    @endif

    <!-- Link to details page using Laravel routing -->
    <a href="{{ route('animals.show', $animal->id) }}">Details</a>
</div>
