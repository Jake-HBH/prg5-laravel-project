{{--//de pagina van de aangemaakte dieren--}}

<x-layout>
    <h2>Overview of all animals</h2>
    {{--    <p>{{$animal->name}}</p>--}}
    {{--    @dd($animals)--}}
    <a href="{{ route('animals.create') }}">Add animal</a>
    @foreach ($animals as $animal)
        <x-animals-animal :animal="$animal"/>
    @endforeach

</x-layout>

