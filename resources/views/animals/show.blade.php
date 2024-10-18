<x-layout>
    <x-slot:heading>
        {{ $animal->name }}
    </x-slot:heading>

    @if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" width="700">
    @else
        <p>No image available</p>
    @endif

    <h3>Species: {{ $animal->species }}</h3>
    <h3>Age: {{ $animal->age }}</h3>
    <h3>Gender: {{ $animal->gender }}</h3>
    <p>Description: {{ $animal->description }}</p>


    <a href="{{ route('animals.index') }}" class="font-bold text-blue-900  hover:underline">
        Back to pet overview
    </a>

{{--    <form action="{{ route('animals.destroy', $animal) }}" method="post">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <input type="submit" value="Delete">--}}
{{--    </form>--}}

{{--    <form action="" method="post">--}}
{{--        @method('PATCH') //edit methode--}}
{{--        @method('DELETE') //delete methode--}}
{{--        @method('PUT') //? methode--}}
{{--        --}}
{{--    </form>--}}
</x-layout>
