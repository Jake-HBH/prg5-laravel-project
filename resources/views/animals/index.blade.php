{{--//de pagina van de aangemaakte dieren--}}

<x-layout>

    <form action="{{ route('animals.index') }}" method="get">
        <label for="filter"></label>
        <select name="filter" id="filter">
            <option value="">All animals</option>
            @foreach($species as $specie)
                <option value="{{ $specie->species }}" {{ ($specie->species == $filteredAnimal) ? 'selected' : ''}}>{{ $specie->species }}</option>
            @endforeach
        </select>


        <button type="submit">Filter</button>

    </form>

    {{--    <p>{{$animal->name}}</p>--}}
    {{--    @dd($animals)--}}
    <a href="{{ route('animals.create') }}" class="font-bold text-blue-900  hover:underline">Add animal</a>
    @foreach ($animals as $animal)
        @if($animal->species == $filteredAnimal)
            <x-animals-animal :animal="$animal"/>

        @elseif($filteredAnimal == '')
            <x-animals-animal :animal="$animal"/>
        @endif

    @endforeach

</x-layout>

