{{--//de pagina van de aangemaakte dieren--}}

<x-layout>
    {{--    <p>{{$animal->name}}</p>--}}
    {{--    @dd($animals)--}}
    <a href="{{ route('animals.create') }}" class="font-bold text-blue-900  hover:underline">Add animal</a>
    @foreach ($animals as $animal)
        <x-animals-animal :animal="$animal"/>
    @endforeach

</x-layout>

