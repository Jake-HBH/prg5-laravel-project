<x-layout>
    <h2>{{ $animal->name }}</h2>
    <h2>{{ $animal->description }}</h2>

    <a href="{{ route('animals.index') }}">
        Ga terug naar dieren adoptie overzicht
    </a>


{{--    <form action="" method="post">--}}
{{--        @method('PATCH') //edit methode--}}
{{--        @method('DELETE') //delete methode--}}
{{--        @method('PUT') //? methode--}}
{{--        --}}
{{--    </form>--}}
</x-layout>
