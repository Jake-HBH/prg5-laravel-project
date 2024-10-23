{{--//de aangemaakte dieren--}}

@props(['animal'])
<x-slot:heading>
    Find your new best buddy here!
</x-slot:heading>


<div class="animal-card">
    <h3><strong>{{ $animal->name }}</strong></h3>

    <h3>{{ $animal->adoption_status }}</h3>


@if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" width="200">
    @else
        <p>No image available</p>
    @endif


    <h3><strong>{{ $animal->address }}</strong> {{ $animal->created_at->format('d-m-Y') }}</h3>


    <!-- Link to details page using Laravel routing -->
    <a href="{{ route('animals.show', $animal->id) }}">Details</a>
</div>
