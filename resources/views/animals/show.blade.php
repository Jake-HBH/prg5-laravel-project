<x-layout>
    <x-slot:heading>
        Animal Page
    </x-slot:heading>
    <h2>{{ $animal->name }}</h2>
    <h2>{{ $animal->description }}</h2>

    <a href="{{ route('animals.index') }}">
        Ga terug naar dieren adoptie overzicht
    </a>

    <form action="{{ route('animals.destroy', $animal) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>

{{--    <form action="" method="post">--}}
{{--        @method('PATCH') //edit methode--}}
{{--        @method('DELETE') //delete methode--}}
{{--        @method('PUT') //? methode--}}
{{--        --}}
{{--    </form>--}}
</x-layout>
